<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;

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

Route::controller(ClientCategoryController::class)->group(function () {

    Route::get('/categories', 'index')->name('categories');
    Route::get('/categories/{category}', 'show')->name('category.products');
});

Route::controller(ClientProductController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/products', 'index')->name('products');
    Route::get('/product/{product}', 'show')->name('product.detail');
});


