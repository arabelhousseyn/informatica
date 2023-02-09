<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category');
Route::get('/product/{product}', [ProductController::class, 'index'])->name('product');
Route::get('/search', SearchController::class)->name('search');
Route::get('/locale', LocaleController::class)->name('locale');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // wishlist
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist', 'index')->name('wishlist.index');
        Route::post('/wishlist', 'store')->name('wishlist.post');
        Route::post('/wishlist/{wishlist}', 'destroy')->name('wishlist.destroy');
    });

    //cart
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart', 'store')->name('cart.store');
        Route::post('/cart/{cart}', 'destroy')->name('cart.destroy');
    });

    // order
    Route::controller(OrderController::class)->middleware('order')->group(function () {
        Route::get('/order', 'view')->name('order.view');
        Route::post('/order', 'store')->name('order.store');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
