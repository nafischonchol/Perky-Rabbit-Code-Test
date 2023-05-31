<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\RegisterUser;

use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('login', [AuthenticateController::class, 'store'])->name('login');
    Route::get('registration', [RegisterUser::class, 'create'])->name('registration');
    Route::post('registration', [RegisterUser::class, 'store'])->name('registration');
});
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthenticateController::class, 'logout'])->name('logut');
});
