<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.category.view');
    }

    public function create()
    {
        if (Gate::allows('supper-permission')) {
            return view('admin.pages.category.add');
        }
        return redirect()->back()->withErrors('bạn không có quyền truy cập!');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        session()->flash('success', 'thêm mới thành công.');
        return redirect()->route('admin.category.view');
    }
}
