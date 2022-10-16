<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;


class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        
        $data = $request->all();
        // dd($data);
        
        if ($result === false) {
            return redirect()->back();
        }

        return redirect()->back()->with('product_added','Thêm sản phẩm thành công');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
            'account_email' => Session::get('account_email'),
            'account_password' => Session::get('account_password'),
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request, Customer $customer)
    {
       
        $result = $this->cartService->addCart($request);
        
        $customer = Customer::orderBy('id', 'DESC')->first();
        if ($result === false) {
            return redirect()->back();
        }
        return redirect()->route('checkout', [$customer->id, $customer->order_key]);
        
    }

    //Checkout
    // public function checkout(Request $request, Customer $customer)
    // {
    //     $customer = Customer::orderBy('id', 'DESC')->first();
    //     return view('carts.checkout', [
    //         'title' => 'Thanh Toán',
    //         'customer' => $customer,
    //         'carts' => $customer->carts()->get()
    //     ]);
        
    // }
    public function checkout(Customer $customer)
    {
        // $customer = Customer::orderBy('id', 'DESC')->first();
        return view('carts.checkout', [
            'title' => 'Thanh Toán đơn hàng ' .$customer->id,
            'customer' => $customer,
            'carts' => $customer->carts()->get()
        ]);
        

    }

    // public function banking(Request $request)
    // {
    //     $customer = Customer::orderBy('id', 'DESC')->first();
    //     return view('carts.banking', [
    //         'title' => 'Thanh Toán',
    //         'customer' => $customer,
    //         'carts' => $customer->carts()->get()
    //     ]);
        

    // }
    
    
}
