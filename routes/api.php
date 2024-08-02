<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieApiController;

// Ruta para obtener todas las películas, con opción de ordenación
Route::get('/movies', [MovieApiController::class, 'index']);

// Ruta para obtener una película por ID
Route::get('/movies/{id}', [MovieApiController::class, 'show']);

// Ruta para agregar una nueva película
Route::post('/movies', [MovieApiController::class, 'store']);

// Ruta para actualizar una película existente
Route::put('/movies/{id}', [MovieApiController::class, 'update']);

// Ruta para eliminar una película
Route::delete('/movies/{id}', [MovieApiController::class, 'destroy']);
