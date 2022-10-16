<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Cart;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        $collect = $this->productService->collect($id);
        
        
        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'collect' => $collect
        ]);
    }

    // public function additional_information($id = '', $slug = '', Request $request, Cart $cart)
    // {
    //     $request->validate([
    //         'account_email'=>'required|email',
    //         'account_password'=>'required',
            
    //     ],[
    //         'account_email.required'=>'Bạn chưa nhập email',
    //         'account_password.required'=>'Bạn chưa nhập mật khẩu',
    //     ]);

        

    //     return view('products.content', [
    //         'title' => $product->name,
    //         'product' => $product,
    //         'products' => $productsMore
    //     ]);
    // }
    
}
