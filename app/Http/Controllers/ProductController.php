<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $product->loadMissing(['category']);

        return view('pages.product', compact('product'));
    }
}
