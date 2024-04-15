<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('api')->group(function () {

    Route::get('/films', [FilmController::class, 'index']);
    Route::get('/film/{id}', [FilmController::class, 'show']);
    Route::post('/film', [FilmController::class, 'store']);
    Route::patch('/film/{id}', [FilmController::class, 'update']);
    Route::delete('/film/{id}', [FilmController::class, 'delete']);

    Route::get('/actors', [ActorController::class, 'index']);
    Route::get('/actor/{id}',[ActorController::class, 'show']);
    Route::post('/actor', [ActorController::class, 'store']);
    Route::patch('/actor/{id}', [ActorController::class, 'update']);
    Route::delete('/actor/{id}', [ActorController::class, 'delete']);

});
