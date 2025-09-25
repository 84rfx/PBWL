<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default route diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route bawaan Laravel Auth (login, register, reset password, dll.)
Auth::routes();

// Hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Resource route untuk books
    Route::resource('books', BookController::class);
});
