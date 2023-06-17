<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.pages.product.view');
    }

    public function create (Request $request) 
    {
        return view('admin.pages.product.add');
    }
}
