<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User_add_cart;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        $account_email = (string)$request->input('acc_email');
        $account_password = (string)$request->input('acc_password');

        
        $carts = Session::get('carts');
        $account = Session::get('account');
        $account[$product_id] = ['id' =>$product_id, 'qty' => $qty, 'account_email' => $account_email, 'account_password' => $account_password];
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            Session::put('account', $account);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        $account[$product_id] = ['id' =>$product_id, 'qty' => $qty, 'account_email' => $account_email, 'account_password' => $account_password];
        Session::put('account', $account);
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        $account = Session::get('account');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        
        if (is_null($account)) return [];
        
        $productId = array_keys($account);
        
        // dd($account);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();
           

            $carts = Session::get('carts');
            $account = Session::get('account');
           

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
                'payment_method' => $request->input('payment_method'),
                'order_key' => Str::random(8)
            ]);
            
            $this->infoProductCart($carts, $account, $customer->id);
            
            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');
            
            #Queue
            // SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            Mail::send('mail.order_success', ['order_key' => $customer->order_key], function($message) use($request){
                $message->to($request->email);
                $message->subject('Đơn hàng đang chờ thanh toán');
            });

            Session::forget('carts');
            
            
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('cart_error', 'Đặt Hàng Lỗi! Vui lòng điền đầy đủ "Thông tin khách hàng" và thử lại');
            return false;
        }
        
        return true;
        
    }

    protected function infoProductCart($carts, $account, $customer_id)
    {
        $productId = array_keys($carts);
        
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price,
                'account_email' => $account[$product->id]['account_email'],
                'account_password' => $account[$product->id]['account_password'],
            ];
            
        }

        return Cart::insert($data);
        
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
    }

    public function checkout($request)
    {
        $customer = Customer::orderBy('id', 'DESC')->first();
    }

    public function admin_update($request, $customer)
    {
        try {
            // $customer->status = (integer)$request->input('status');
            if($request->has('paid'))
                {
                    if($request->has('delivered')){ 
                        $customer->status = 2;
                    }else{
                        $customer->status = 1;
                    }
                }
            // elseif($request->has('paid') && $request->has('delivered'))
            //     {$customer->status = 2;}
            else{
                if($request->has('delivered')){ 
                    Session::flash('error',  'Cần xác nhận đã thanh toán trước');
                    return false;
                }else{
                    $dt = $customer->created_at->addDay();
                    $now = Carbon::now();
                    if($dt >= $now)
                    {
                        $customer->status = 0;
                    }
                    else{
                        $customer->status = 3;
                    }

                    
                }
            }
            // dd($customer->status);
            
            // if($dt >= $now)
            // {$result = 'expired';}
            // else{
            //     $result= 'active';
            // }
            // dd($result);
            
            $customer->save();
            Session::flash('success', 'Cập nhật Đơn hàng #'  . str_pad($customer->id , 5, "0", STR_PAD_LEFT) . ' thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Đơn hàng Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

}
