<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Category $category): View
    {
        $products = $category->products()->latest()->paginate(20);
        return view('pages.category', compact('category', ['products']));
    }
}
