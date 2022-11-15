<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        // return $request->input();
        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->phone = $request->get('phone');
        $customer->email = $request->get('email');
        $customer->content = $request->get('content');
        $customer->payment_method = "none";
        $customer->order_key = "none";
        $customer->save();

        return $customer;

    }
}
