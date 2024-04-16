<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
    Route::post('/films', [FilmController::class, 'store'])->name('films.store');
    Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');
    Route::put('/films/{id}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

    Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
    Route::post('/actors', [ActorController::class, 'store'])->name('actors.store');
    Route::get('/actors/{id}', [ActorController::class, 'show'])->name('actors.show');
    Route::put('/actors/{id}', [ActorController::class, 'update'])->name('actors.update');
    Route::delete('/actors/{id}', [ActorController::class, 'destroy'])->name('actors.destroy');
Route::middleware('auth')->group(function () {

    Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
    Route::get('/films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');

    Route::get('/actors/create', [ActorController::class, 'create'])->name('actors.create');
    Route::get('/actors/{id}/edit', [ActorController::class, 'edit'])->name('actors.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
