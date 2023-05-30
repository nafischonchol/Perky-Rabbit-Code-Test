<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticateController;

Route::middleware(['guest'])->group(function () {
    Route::get('login',[AuthenticateController::class,'create'])->name('login');
    Route::post('login',[AuthenticateController::class,'store'])->name('login');
});
Route::middleware(['auth'])->group(function () {
    Route::post('logout',[AuthenticateController::class,'logout'])->name('logut');
});


