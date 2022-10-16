<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PaymentController extends Controller
{

    //MoMo
    public function momo(Request $request)
    {
        $content = (string)$request->input('content');
        $name = (string)$request->input('name');
        $email = (string)$request->input('email');
        $order_id = (int)$request->input('id');
        dd($order_id);
        return view('checkout.momo',compact('content', 'order_id', 'name', 'email'), [
            'title' => 'Thanh toán - GShop',
            // 'customer' => $customer,
            // 'carts' => $customer->carts()->get()
            
        ]);
    }
    
    
}
