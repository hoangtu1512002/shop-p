<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Helpers\GoogleDriver;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return view('admin.pages.product.view', ['products' => $products, 'index' => 1]);
    }

    public function create()
    {
        if (Gate::allows('create-product')) {
            $categories = Category::all();
            return view('admin.pages.product.add', ['categories' => $categories]);
        }
        return redirect()->back()->withErrors(trans('messages.notAccess'));
    }

    public function store(Request $request)
    {
        $request->flash();
        $data = $request->all();
        $imageData = GoogleDriver::upload($data['image']);
        $data['image_url'] = json_encode($imageData['urls']);
        $data['image_name'] = json_encode($imageData['names']);
        $this->product->create($data);
        session()->flash('success', trans('messages.createSuccess'));
        return redirect()->route('admin.product.view');
    }

    public function edit($productId)
    {
        if (Gate::allows('update-product') === true) {
            $productEdit = $this->product->where('id', $productId)->where('status', $this->product::STATUS_ACTIVE)->first();
            $categories = Category::all();
            if (empty($productEdit)) {
                return redirect()->back()->withErrors(trans('messages.notExist'));
            }
            return view('admin.pages.product.edit', ['product' => $productEdit, 'categories' => $categories]);
        }
        return redirect()->back()->withErrors(trans('messages.notAccess'));
    }
}
