<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('website');
Route::get('register', [HomeController::class, 'ExampleRegShow'])->name('example.registershow');
Route::post('register', [HomeController::class, 'ExampleReg'])->name('example.register');
Route::post('/re-print', [HomeController::class, 'rePrint'])->name('reprint');
Route::get('/register-complete/{id}', [HomeController::class, 'registerComplete'])->name('register.complete');

Route::get('/conference-event/details', [HomeController::class, 'eventDetails'])->name('event.details');
Route::get('/gallery/page', [HomeController::class, 'gallery'])->name('gallery.page');
