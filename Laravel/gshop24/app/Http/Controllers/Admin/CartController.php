<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Carbon\Carbon;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {                                                                                                        
        $carts = $this->cart->getProductForCart($customer);

        $dt = $customer->created_at->addDay();
        $now = Carbon::now();
       

        // if($dt >= $now)
        // {
        //     $customer->status = 0;
        // }
        // else{
        //     $customer->status = 3;
        // }

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts,
            'dt' => $dt,
            'now' => $now

        ]);
    }
    
    public function admin_update(Request $request, Customer $customer)
    {
        $result = $this->cart->admin_update($request, $customer);
        if ($result) {
            return redirect('/admin/customers');
        }

        return redirect()->back();
    }
}
