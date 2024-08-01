<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SizeBoxController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::middleware(['admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/products',[AdminProductController::class,'index']);
        Route::get('/products/edit/{product}',[AdminProductController::class,'edit']);
        Route::get('/products/create',[AdminProductController::class,'create']);
        Route::post('/products',[AdminProductController::class,'store'])->name('products.store');
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

