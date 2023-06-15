<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\QuoteLikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Create 'register' route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']); // Add the 'post' route to process the register form submission

// Create 'dashboard' route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Create 'login' route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']); // Add the 'post' route to process the login form submission

// Create 'logout' route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Create 'home' route
Route::get('/', function() {
    return view('home');
})->name('home');

// Create 'quotes' route
Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes');
Route::post('/quotes', [QuoteController::class, 'store']);
Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');

// Create 'quote like' route
Route::post('/quotes/{quote}/likes', [QuoteLikeController::class, 'store'])->name('quotes.likes');

// Create 'quote dislike' route
Route::delete('/quotes/{quote}/likes', [QuoteLikeController::class, 'destroy'])->name('quotes.like');