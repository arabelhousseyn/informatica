<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\AdsController;
use App\Http\Controllers\Dashboard\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/', [LoginController::class, 'view'])->name('login');
        Route::post('/', [LoginController::class, 'auth'])->name('auth');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/admin', [DashboardController::class, 'view'])->name('admin');
        Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

        Route::resources([
            '/admins' => AdminController::class,
            '/users' => UsersController::class,
            '/products' => ProductController::class,
            '/ads' => AdsController::class,
            '/orders' => OrderController::class,
        ]);
    });
});
