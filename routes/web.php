<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render("Home");
});


Route::prefix('admin')->group(function () {
    Route::resource('products', 'App\Http\Controllers\ProductController');
});

