<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function view(ProductCategory $category)
    {
        return view('category.view');
    }
}
