<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $new_products = Product::newProducts()->get();
        $products = Product::latest('created_at')->get();

        return view('pages.main-page', compact('products', ['new_products']));
    }
}
