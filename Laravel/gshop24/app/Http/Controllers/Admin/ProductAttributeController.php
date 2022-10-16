<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Product;

class ProductAttributeController extends Controller
{
    protected function show($product_id)
    {
        
        $product_by_id = Product::find($product_id);
        $attribute = Attribute::where('product_id', $product_id)->get();
        return view('admin.product.attribute',compact('product_by_id', 'attribute'), [
            'title' => 'Thêm thuộc tính'
        ]);
    }

    protected function add(Request $request, $product_id)
    {
        

        if($request->isMethod('post')){
            $data =$request->all();

            foreach($data['term'] as $key =>$val){
                $attribute = new Attribute;
                $attribute->term = $val;
                $attribute->product_id = $product_id;
                $attribute->price = $data['price'][$key];
                $attribute->price_sale = $data['price_sale'][$key];
                $attribute->qty = $data['qty'][$key];
                $attribute->save();
            }

        }
        // dd($data);
        return back()->with('attribute_message','Thêm thuộc tính thành công');
    }

}
