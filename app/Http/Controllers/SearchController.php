<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Product;

class SearchController extends Controller
{

    public function __invoke(SearchRequest $request)
    {
        $products = Product::search($request->input('key'), $request->input('category'))->latest()->paginate(20);
        $key = $request->input('key');

        return view('pages.search', compact('products', ['key']));
    }
}
