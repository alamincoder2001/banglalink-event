<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('website');
Route::post('example-register', [HomeController::class, 'ExampleReg'])->name('example.register');
Route::get('/register-complete/{id}', [HomeController::class, 'registerComplete'])->name('register.complete');
