<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
        ProductService $product) {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }
    public function sliderShow()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }

    public function featured()
    {
        return $featureds = Product::where('featured', 1)->get();

    }

    public function index()
    {
        $featureds = Product::where('featured', 1)->get();
        $entertains = Product::where('menu_id', 1)->limit(8)->inRandomOrder()->get();
        $works = Product::where('menu_id', 2)->limit(8)->get();
        $tools = Product::where('menu_id', 3)->limit(8)->get();
        $studies = Product::where('menu_id', 4)->limit(8)->get();
        $designs = Product::where('menu_id', 5)->limit(8)->get();
        $vpns = Product::where('menu_id', 6)->limit(8)->get();
        $data4gs = Product::where('menu_id', 7)->limit(8)->get();

        return response()->json(['featureds' => $featureds,
            'entertains' => $entertains,
            'works' => $works,
            'tools' => $tools,
            'studies' => $studies,
            'designs' => $designs,
            'vpns' => $vpns,
            'data4gs' => $data4gs,
        ]);

        // return view('home', compact('featureds', 'entertains', 'works', 'tools', 'studies', 'designs', 'vpns', 'data4gs'), [
        //     'title' => 'GShop - Chuyên Cung Cấp Tài Khoản Premium Giá Rẻ Uy Tín',
        //     'sliders' => $this->slider->show(),
        //     'menus' => $this->menu->show(),
        //     'products' => $this->product->get(),
        // ]);
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
