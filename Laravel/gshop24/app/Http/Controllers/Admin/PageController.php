<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Page\PageService;
use App\Models\Page;

class PageController extends Controller
{
    protected $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index()
    {
        return view('admin.pages.list', [
            'title' => 'Danh sách page',
            'pages' => $this->pageService->get()
        ]);
    }

    public function show(Page $page)
    {
        return view('admin.pages.edit', [
            'title' => 'Chỉnh Sửa Page: '  . $page->name,
            'page' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $result = $this->pageService->update($request, $page);
        if ($result) {
            return redirect('/admin/pages/list');
        }

        return redirect()->back();
    }
}
