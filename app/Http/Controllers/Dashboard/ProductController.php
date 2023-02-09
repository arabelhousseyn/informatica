<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateProductRequest;
use App\Http\Requests\Dashboard\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['category', 'admin'])->get();

        return view('dashboard.pages.product.product', compact('products'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('dashboard.pages.product.add', compact('allCategories'));
    }


    public function store(CreateProductRequest $request)
    {
        $published = ['published_at' => now()];
        $product = Auth::guard('admin')->user()->products()->create(array_merge($published, $request->validated()));

        foreach ($request->file('images') as $item) {
            $path = $item->storeAs('products', uniqid() . ".jpg");
            $product->media()->create(['url' => $path]);
        }

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit(Product $product)
    {
        $allCategories = Category::all();

        return view('dashboard.pages.product.edit', compact('product', 'allCategories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->except('discount'));

        if (intval($request->input('discount')) !== 0) {
            $product->applyDiscount(intval($request->input('discount')) / 100);
        } else {
            $product->resetPrice();
        }

        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
