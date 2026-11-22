<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('movies', MovieController::class)
    ->middlewareFor(['create', 'store', 'edit', 'update', 'destroy'], 'auth');


Route::get('/register',  [RegisterController::class, 'create'])
->name('register');
Route::post('/register', [RegisterController::class, 'store'])
->name('register.store');

Route::get('/login',   [LoginController::class, 'create'])
->name('login');
Route::post('/login',  [LoginController::class, 'store'])
->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])
->name('logout');
