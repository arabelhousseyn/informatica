<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $products = $category->products()->latest()->paginate(20);
        return view('pages.category', compact('category', [ 'products']));
    }
}
