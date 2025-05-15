<?php

use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\ComentarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('articulos', ArticuloController::class);
Route::apiResource('comentarios', ComentarioController::class);
Route::get('/articulos/{id}/comentarios', [ComentarioController::class, 'showCbyA']);
Route::post('/articulos/{id}/comentarios', [ComentarioController::class, 'store']);