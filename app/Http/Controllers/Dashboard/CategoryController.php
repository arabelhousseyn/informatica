<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('children')->withDepth()->latest('created_at')->get()->toTree();

        return view('dashboard.pages.category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('dashboard.pages.category.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $category = new Category(['name' => $request->validated('name')]);

        $category->saveAsRoot();

        if ($request->hasFile('image')) {
            $filename = uniqid().".jpg";
            $request->file('image')->storeAs('public/category', $filename);
            $category->media()->create(['url' => config('app.url')."/storage/category/$filename"]);
        }

        return redirect()->back();
    }

    public function show(Category $category): View
    {
        return view('dashboard.pages.category.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('dashboard.pages.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update(['name' => $request->validated('name')]);

        if ($request->hasFile('image')) {
            $filename = uniqid().".jpg";
            $request->file('image')->storeAs('public/category', $filename);
            $category->media()->update(['url' => config('app.url')."/storage/category/$filename"]);
        }

        return redirect()->back();
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->back();
    }

    public function storeSubCategory(StoreCategoryRequest $request, Category $category): RedirectResponse
    {
        $subCategory = $category->children()->create(['name' => $request->validated('name')]);

        if ($request->hasFile('image')) {
            $filename = uniqid().".jpg";
            $request->file('image')->storeAs('public/category', $filename);
            $subCategory->media()->create(['url' => config('app.url')."/storage/category/$filename"]);
        }

        return redirect()->back();
    }
}
