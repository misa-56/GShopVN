<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
        ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        $featureds = Product::where('featured',1)->get();
        $entertains = Product::where('menu_id',1)->limit(8)->inRandomOrder()->get();
        $works = Product::where('menu_id',2)->limit(8)->get();
        $tools = Product::where('menu_id',3)->limit(8)->get();
        $studies = Product::where('menu_id',4)->limit(8)->get();
        $designs = Product::where('menu_id',5)->limit(8)->get();
        $vpns = Product::where('menu_id',6)->limit(8)->get();
        $data4gs = Product::where('menu_id',7)->limit(8)->get();
        

        return view('home', compact('featureds','entertains', 'works', 'tools', 'studies', 'designs', 'vpns', 'data4gs'), [
            'title' => 'GShop - Chuyên Cung Cấp Tài Khoản Premium Giá Rẻ Uy Tín',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}
