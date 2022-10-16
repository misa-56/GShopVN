<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Services\Page\PageService;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $page = $this->pageService->getId($id);


        return view('page', [
            'title' => $page->name,
            'page'  => $page
        ]);
    }


}
