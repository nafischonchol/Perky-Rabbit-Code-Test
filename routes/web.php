<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    })->name('home');

    Route::prefix('admin')->group(function () {
        Route::resource('products', 'App\Http\Controllers\ProductController');
    });
});
