<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;




Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class, 'showAdminLoginForm']);
    Route::post('/', [LoginController::class, 'AdminLogin'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
