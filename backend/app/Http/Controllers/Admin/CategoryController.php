<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Helpers\GoogleDriver;
use App\Helpers\Message;
use App\Models\Category;

class CategoryController extends Controller
{

    private $paginate;
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->paginate = $category->paginate;
    }

    public function index(Request $request)
    {
        $request->flash();
        $keyword = $request->input("search");
        $index = 1;

        if ($keyword === null) {
            $categories = $this->category->paginate($this->paginate);
            return view('admin.pages.category.view', compact('categories', 'index'));
        }

        $categories = $this->category->where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->paginate($this->paginate);
        return view('admin.pages.category.view', compact('categories', 'index'));
    }


    public function create()
    {
        if (Gate::allows('create-category')) {
            return view('admin.pages.category.add');
        }
        return redirect()->back()->withErrors(Message::notAccess);
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $categoryRequest->flash();
        $data = $categoryRequest->all();
        $imageData = GoogleDriver::upload($data['image']);
        $data['image_url'] = $imageData['url'];
        $data['image_name'] = $imageData['name'];
        $this->category->create($data);
        session()->flash('success', Message::createSuccess);
        return redirect()->route('admin.category.view');
    }

    public function edit($id)
    {
        if (Gate::allows('update-category')) {
            $category = $this->category->findOrFail($id);
            return view('admin.pages.category.edit', compact('category'));
        }
        return redirect()->back()->withErrors(Message::notAccess);
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $category = $this->category->findOrFail($id);
        $data = $categoryRequest->all();
        if ($categoryRequest->image != null) {
            $imageOld = $category->image_name;
            GoogleDriver::delete($imageOld);
            $imageNew = GoogleDriver::upload($data['image']);
            $data['image_url'] = $imageNew['url'];
            $data['image_name'] = $imageNew['name'];
        }
        $category->update($data);
        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.category.view');
    }

    public function delete($id)
    {
        if (Gate::allows('delete-category')) {
            $category = $this->category->findOrFail($id);
            $imageOld = $category->image_name;
            GoogleDriver::delete($imageOld);
            $category->delete();
            session()->flash('success', Message::deleteSuccess);
            return redirect()->route('admin.category.view');
        }
        return redirect()->back()->withErrors(Message::notAllowed);
    }

    public function stopSelling($id)
    {
        if (Gate::allows('selling-category')) {
            $category = $this->category->findOrFail($id);
            $category->status = 2;
            $category->save();
            session()->flash('success', Message::updateSuccess);
            return redirect()->route('admin.category.view');
        }
        return redirect()->back()->withErrors(Message::notAllowed);
    }

    public function restore($id)
    {
        if (Gate::allows('selling-category')) {
            $category = $this->category->findOrFail($id);
            $category->status = 1;
            $category->save();
            session()->flash('success', Message::updateSuccess);
            return redirect()->route('admin.category.view');
        }
        return redirect()->back()->withErrors(Message::notAllowed);
    }
}
