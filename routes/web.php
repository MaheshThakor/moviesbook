<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\MovieBookController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieScreeningController;
use App\Http\Controllers\TheatreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
//User
Route::get('/', [MainPageController::class, 'index'])->name('MainPage')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [MovieController::class, 'show']);
Route::get('/actor/{id}', [ActorController::class, 'show']);
Route::get('/book/{id}', [MovieBookController::class, 'index']);
Route::post('/reserve', [MovieBookController::class, 'reserve'])->name('ticket-save');
Route::post('/search', [MovieController::class, 'search'])->name('Searchbar');

//Admin
Route::get('/admin-panel', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/actor-details', [ActorController::class, 'index'])->name('actor-details');
Route::post('/actor-save', [ActorController::class, 'store'])->name('actor-save');
Route::get('/movies-details', [MovieController::class, 'index'])->name('movies-details');
Route::post('/movies-save', [MovieController::class, 'store'])->name('movies-save');
Route::post('/cast-save', [MovieController::class, 'cast'])->name('cast-save');
Route::get('/theatres-details', [TheatreController::class, 'index'])->name('theatres-details');
Route::post('/theatres-save', [TheatreController::class, 'store'])->name('theatres-save');
Route::post('/city-save', [TheatreController::class, 'city'])->name('city-save');
Route::get('/screening-details', [MovieScreeningController::class, 'index'])->name('screening-details');
Route::post('/screening-save', [MovieScreeningController::class, 'store'])->name('screening-save');


//Admin Test
Route::get('/login/admin', [LoginController::class,'showAdminLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
//Route::view('/home', 'home')->middleware('auth');
