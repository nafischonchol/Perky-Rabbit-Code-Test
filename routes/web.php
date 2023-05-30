<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    })->name('home');

    Route::prefix('admin')->group(function () {
        Route::resource('products', 'App\Http\Controllers\ProductController');
        Route::get('products-by-category/{category_id}', [ProductController::class, 'productByCategory']);
        Route::resource('stocks', 'App\Http\Controllers\StockController');
        Route::get('current-stocks/{product_id}', [StockController::class, 'getCurrentStock']);
    });

});
