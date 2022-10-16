<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->key.'%')->get();

        return view('search', compact('products'), [
            'title' => 'Tìm kiếm'
        ]);

    }
}
