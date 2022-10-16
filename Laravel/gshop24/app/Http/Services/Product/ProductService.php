<?php


namespace App\Http\Services\Product;


use App\Models\Product;

class ProductService
{
    // const LIMIT = 12;
    public function get($page = null)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->paginate(16);
            // ->when($page != null, function ($query) use ($page) {
            //     $query->offset($page * self::LIMIT);
            // })
            // ->limit(self::LIMIT)
            // ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->firstOrFail();
    }

    public function more($id)
    {
        $menu = Product::where('id', $id)
        // ->select('menu_id')
        ->firstOrFail();
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->where('menu_id',$menu->menu_id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    public function collect($id)
    {
        $code = Product::where('id', $id)
            ->select('product_code')
            ->firstOrFail();
        $product_code = $code->product_code;
        return Product::select('id', 'name', 'term')
        ->where('product_code',$product_code)
        ->get();
        // dd($show);
    }
    
}
