<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/men', [HomeController::class, 'showMen']);
Route::get('/women', [HomeController::class, 'showWomen']);
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('detail');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cart', [CartController::class, 'index']);
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');


Route::get('/checkout', function () {
    return view('checkout');
});