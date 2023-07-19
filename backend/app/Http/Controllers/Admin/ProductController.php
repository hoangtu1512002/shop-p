<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Helpers\GoogleDriver;
use App\Helpers\Message;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.pages.product.view');
    }

    public function create () 
    {
        if(Gate::allows('create')) {
            $categories = Category::all();
            return view('admin.pages.product.add', ['categories' => $categories]);
        }
        return redirect()->back()->withErrors(Message::notAccess);
    }

    public function store (Request $request) 
    {
        
    }
}
