<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Ralfh Justyn V. Gianan | 2023-70756 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/movies/filter/{genre?}', [MovieController::class, 'filter'])->name('movies.filter');
Route::resource('movies', MovieController::class)->only(['index', 'show', 'create', 'store']);

