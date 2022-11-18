<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\FavouritesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RealestateController;
use App\Http\Controllers\RegisterController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//nasledice name od ovog gore, tako da ne moramo 2 puta da definisemo

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/add-realestate', [RealestateController::class, 'index'])->name('addRealestate');
Route::post('/add-realestate', [RealestateController::class, 'store']);

Route::get('/city', [CityController::class, 'index'])->name('city');

Route::get('/favourites', [FavouritesController::class, 'index'])->name('favourites');
