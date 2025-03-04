<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/')->name('dashboard.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [LoginController::class, 'login'])->name('login');
        Route::post('login_submit', [LoginController::class, 'loginSubmit'])->name('login_submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
