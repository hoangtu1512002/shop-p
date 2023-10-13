<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Helpers\GoogleDriver;
use App\Http\Requests\Admin\ProductRequest;

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

    public function store(ProductRequest $productRequest)
    {
        $productRequest->flash();
        $data = $productRequest->all();

        $pattern = '/\d+/';
        if (preg_match_all($pattern, $data['price'], $matches)) {
            $data['price'] = implode('', $matches[0]);
        }
        $data['total']  = str_replace("_", "", $data['total']);

        $upload = GoogleDriver::upload($data['image']);
        $data['image_url'] = json_encode($upload['urls']);
        $data['image_name'] = json_encode($upload['names']);

        $this->product->create($data);
        session()->flash('success', trans('messages.createSuccess'));
        return redirect()->route('admin.product.view');
    }

    public function edit($productId)
    {
        if (Gate::allows('update-product')) {
            $productEdit = $this->product->where('id', $productId)->where('status', $this->product::STATUS_ACTIVE)->first();
            $categories = Category::all();
            if (empty($productEdit)) {
                return redirect()->back()->withErrors(trans('messages.notExist'));
            }
            return view('admin.pages.product.edit', ['product' => $productEdit, 'categories' => $categories]);
        }
        return redirect()->back()->withErrors(trans('messages.notAccess'));
    }

    public function update(ProductRequest $productRequest, $productId)
    {
        dd($productId);
        $productUpdate = $this->product->where('id', $productId)->where('status', $this->product::STATUS_ACTIVE)->first();

        if (empty($productUpdate)) {
            return redirect()->back()->withErrors(trans('messages.notExist'));
        }

        $dataUpdate = $productRequest->all();

        $pattern = '/\d+/';
        if (preg_match_all($pattern, $dataUpdate['price'], $matches)) {
            $dataUpdate['price'] = implode('', $matches[0]);
        }
        $dataUpdate['total']  = str_replace("_", "", $dataUpdate['total']);

        if (empty($dataUpdate['image'])) {
            if(count(json_decode($productUpdate->image_name)) === 0) {
                return redirect()->back()->withErrors(trans('Ảnh không được để trống'));
            };
            $productUpdate->update($dataUpdate);
        } else {
            $oldImageUrl = json_decode($productUpdate->image_url);
            $oldImageName = json_decode($productUpdate->image_name);
            $upload = GoogleDriver::upload($dataUpdate['image']);
            $dataUpdate['image_url'] = json_encode(array_merge($oldImageUrl, $upload['urls']));
            $dataUpdate['image_name'] = json_encode(array_merge($oldImageName, $upload['names']));
            $productUpdate->update($dataUpdate);
        }
        session()->flash('success', trans('messages.updateSuccess'));
        return redirect()->route('admin.product.view');
    }

    public function deleteImage(Request $request, $productId)
    {
        $productUpdate = $this->product->where('id', $productId)->where('status', $this->product::STATUS_ACTIVE)->first();

        $imgDeleteName = $request->imgDeleteName;
        $imgDeleteUrl = $request->imgDeleteUrl;

        $newImgUpdateUrl = array_filter(json_decode($productUpdate->image_url), function ($item) use ($imgDeleteUrl) {
            return $item != $imgDeleteUrl;
        });

        $newImgUpdateName = array_filter(json_decode($productUpdate->image_name), function ($item) use ($imgDeleteName) {
            return $item != $imgDeleteName;
        });
        GoogleDriver::delete($imgDeleteName);
        $productUpdate->image_url = json_encode($newImgUpdateUrl);
        $productUpdate->image_name = json_encode($newImgUpdateName);
        $productUpdate->save();
    }
}
