<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Helpers\GoogleDriver;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $index = 1;
        return view('admin.pages.category.view', compact('categories', 'index'));
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
        $category = new Category;
        $data = $categoryRequest->all();
        $imageData = GoogleDriver::upload($data['image']);
        $data['image_url'] = $imageData['url'];
        $data['image_name'] = $imageData['name'];
        $category->create($data);
        session()->flash('success', 'thêm mới thành công.');
        return redirect()->route('admin.category.view');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.edit', compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $category = Category::findOrFail($id);
        $data = $categoryRequest->all();
        if ($categoryRequest->image != null) {
            $imageOld = $category->image_name;
            GoogleDriver::delete($imageOld);
            $imageNew = GoogleDriver::upload($data['image']);
            $data['image_url'] = $imageNew['url'];
            $data['image_name'] = $imageNew['name'];
        }
        $category->update($data);
        session()->flash('success', 'cập nhật thành công.');
        return redirect()->route('admin.category.view');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $imageOld = $category->image_name;
        GoogleDriver::delete($imageOld);
        $category->delete();
        session()->flash('success', 'xóa thành công.');
        return redirect()->route('admin.category.view');
    }
}
