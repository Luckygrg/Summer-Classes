<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/movie', [MovieController::class, 'movie'])->name('movie');
Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
Route::delete('/movie/{genreId}', [MovieController::class, 'delete'])->name('movie.delete');

Route::get('/celebrities', [HomeController::class, 'celebrities'])->name('celebrities');
Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::get('/genre', [GenreController::class, 'genre'])->name('genre');
Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
Route::get('/genre/{genreId}/edit', [GenreController::class, 'edit'])->name('genre.edit');
Route::put('/genre/{genreId}', [GenreController::class, 'update'])->name('genre.update');
Route::delete('/genre/{genreId}', [GenreController::class, 'delete'])->name('genre.delete');
