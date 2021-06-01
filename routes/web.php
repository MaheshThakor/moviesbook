<?php

use Illuminate\Support\Facades\Route;

//Main Page
Route::get('/', [App\Http\Controllers\MainPageController::class, 'index'])->name('MainPage');
Auth::routes();
//Search
Route::post('/search', [App\Http\Controllers\MovieController::class, 'search'])->name('Searchbar');
//User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [App\Http\Controllers\MovieController::class, 'show']);
Route::get('/actor/{id}', [App\Http\Controllers\ActorController::class, 'show']);
Route::get('/book/{id}', [App\Http\Controllers\MovieBookController::class, 'index']);
Route::post('/reserve', [App\Http\Controllers\MovieBookController::class, 'reserve'])->name('ticket-save');
//Admin
Route::get('/admin-panel', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/actor-details', [App\Http\Controllers\ActorController::class, 'index'])->name('actor-details');
Route::post('/actor-save', [App\Http\Controllers\ActorController::class, 'store'])->name('actor-save');
Route::get('/movies-details', [App\Http\Controllers\MovieController::class, 'index'])->name('movies-details');
Route::post('/movies-save', [App\Http\Controllers\MovieController::class, 'store'])->name('movies-save');
Route::post('/cast-save', [App\Http\Controllers\MovieController::class, 'cast'])->name('cast-save');
Route::get('/theatres-details', [App\Http\Controllers\TheatreController::class, 'index'])->name('theatres-details');
Route::post('/theatres-save', [App\Http\Controllers\TheatreController::class, 'store'])->name('theatres-save');
Route::post('/add-seat', [App\Http\Controllers\TheatreController::class, 'seat'])->name('add-seat');
Route::post('/city-save', [App\Http\Controllers\TheatreController::class, 'city'])->name('city-save');
Route::get('/screening-details', [App\Http\Controllers\MovieScreeningController::class, 'index'])->name('screening-details');
Route::post('/screening-save', [App\Http\Controllers\MovieScreeningController::class, 'store'])->name('screening-save');
