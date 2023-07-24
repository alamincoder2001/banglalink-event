<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SliderController;
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

    // slider
    Route::get('/slider', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::get('/get-slider/{id?}', [SliderController::class, 'index'])->name('admin.slider.index');
    Route::post('/slider', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/delete-slider/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
    
    // gallery
    Route::get('/gallery', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::get('/get-gallery/{id?}', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/delete-gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
   
    // event
    Route::get('/event', [EventController::class, 'create'])->name('admin.event.create');
    Route::get('/get-event/{id?}', [EventController::class, 'index'])->name('admin.event.index');
    Route::post('/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/delete-event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

});
