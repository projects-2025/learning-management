<?php

// use App\Http\Controllers\Dashboard\Admin\AdminController;

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ProfileController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login_submit', [AuthController::class, 'loginSubmit'])->name('login_submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('update.profile');
        Route::get('change/password', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::post('update/password', [ProfileController::class, 'updatePassword'])->name('update.password');


        /* admins */
        Route::resource('admins', AdminController::class)->except('show');
        Route::post('/admins/change-status', [AdminController::class, 'changeStatus'])->name('admins.changeStatus');




    });
});
