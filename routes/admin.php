<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UniversityController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class, 'showAdminLoginForm']);
    Route::post('/', [LoginController::class, 'AdminLogin'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // register list
    Route::get('/register-list', [AdminController::class, 'registerList'])->name('admin.registerlist');
    Route::get('/register-delete/{id}', [AdminController::class, 'registerDestroy'])->name('admin.registerdestroy');
    
    // university
    Route::get('/university', [UniversityController::class, 'create'])->name('admin.university.create');
    Route::get('/get-university/{id?}', [UniversityController::class, 'index'])->name('admin.university.index');
    Route::post('/university', [UniversityController::class, 'store'])->name('admin.university.store');
    Route::get('/delete-university/{id}', [UniversityController::class, 'destroy'])->name('admin.university.destroy');

});
