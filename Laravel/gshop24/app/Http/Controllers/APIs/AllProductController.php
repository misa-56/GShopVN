<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class AllProductController extends Controller
{

    protected $menuService;
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->get();
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result])->render();

            return response()->json(['html' => $html]);
        }

        return response()->json(['html' => '']);
    }

}
