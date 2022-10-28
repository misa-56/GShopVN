<?php

namespace App\Http\Services\Page;

use App\Models\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PageService
{
    public function get()
    {
        return Page::orderByDesc('id')->paginate(15);
    }
    public function update($request, $page)
    {
        try {
            $page->content = (string) $request->input('content');
            $page->save();
            Session::flash('success', 'Cập nhật Page thành công');
        } catch (\Exception$err) {
            Session::flash('error', 'Cập nhật Page Lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }
    public function getId($id)
    {
        return Page::where('id', $id)->firstOrFail();
    }
}
