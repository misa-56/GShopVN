<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function product($id)
    {
        return Product::where('id', $id)->get();
    }
}
