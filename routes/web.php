<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;


Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/peliculas', [MovieController::class, 'showMoviesByCategory'])->name('movies.byCategory');


Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');