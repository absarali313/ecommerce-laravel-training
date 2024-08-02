<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;




Route::get('/',[\App\Http\Controllers\ProductController::class,'index'])->name('home');
Route::get('/product/{product}',[\App\Http\Controllers\ProductController::class,'show'])->name('productDetails');





Route::middleware(['admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin');
    });
});

Route::middleware('guest')->group(function () {
    Route::controller(SessionController::class)->group(function () {

        Route::post('/login', 'store');
        Route::get('/login', 'create');
        Route::post('/logout', 'destroy')->withoutMiddleware('guest')->middleware('auth');
    });
    Route::controller(RegisteredUserController::class)->group(function () {

        Route::post('/register', 'store');
        Route::get('/register', 'create');

    });
});

