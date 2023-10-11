<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ParticipatingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UniversityController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class, 'showAdminLoginForm']);
    Route::post('/', [LoginController::class, 'AdminLogin'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //profile Route
    Route::get('/profile', [AdminController::class, 'profileIndex'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::post('/profileImage', [AdminController::class, 'imageUpdate'])->name('admin.profile.imageUpdate');

    // register list
    Route::get('/register-list', [AdminController::class, 'registerList'])->name('admin.registerlist');
    Route::get('/register-delete/{id}', [AdminController::class, 'registerDestroy'])->name('admin.registerdestroy');
    Route::post('/search-register', [AdminController::class, 'searchRegister'])->name('admin.searchRegister');
    Route::post('/get-graph-data', [AdminController::class, 'getGraphData'])->name('admin.get.graphdata');

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
    Route::post('/status-change-slider', [SliderController::class, 'status'])->name('admin.slider.status');

    // gallery
    Route::get('/gallery', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::get('/get-gallery/{id?}', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/delete-gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    // participant
    Route::get('/participant', [ParticipatingController::class, 'create'])->name('admin.participant.create');
    Route::get('/get-participant/{id?}', [ParticipatingController::class, 'index'])->name('admin.participant.index');
    Route::post('/participant', [ParticipatingController::class, 'store'])->name('admin.participant.store');
    Route::get('/delete-participant/{id}', [ParticipatingController::class, 'destroy'])->name('admin.participant.destroy');

    // event
    Route::get('/event', [EventController::class, 'create'])->name('admin.event.create');
    Route::get('/get-event/{id?}', [EventController::class, 'index'])->name('admin.event.index');
    Route::post('/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/delete-event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
});
