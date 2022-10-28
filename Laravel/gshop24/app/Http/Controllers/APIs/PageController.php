<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    // protected $pageService;

    // public function __construct(PageService $pageService)
    // {
    //     $this->pageService = $pageService;
    // }

    // public function index(Request $request, $id, $slug = '')
    // {
    //     $page = $this->pageService->getId($id);

    //     return view('page', [
    //         'title' => $page->name,
    //         'page'  => $page
    //     ]);
    // }

    public function page($id)
    {
        return Page::where('id', $id)->firstOrFail();
    }

}
