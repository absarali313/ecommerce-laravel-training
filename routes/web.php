<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::controller(SessionController::class)->group(function () {

        Route::post('/login', 'store')->name('login');
        Route::get('/login', 'create')->name('login_form');
        Route::post('/logout', 'destroy')->withoutMiddleware('guest')->middleware('auth')->name('logout');
    });
    Route::controller(RegisteredUserController::class)->group(function () {

        Route::post('/register', 'store')->name('register');
        Route::get('/register', 'create')->name('register_form');

    });
});

Route::controller(ClientCategoryController::class)->group(function () {

    Route::get('/categories', 'index')->name('client_categories');
    Route::get('/categories/{category}', 'show')->name('client_category_products');
});

Route::controller(ClientProductController::class)->group(function () {

    Route::get('/', 'index')->name('home');
    Route::get('/products', 'index')->name('client_products');
    Route::get('/product/{product}', 'show')->name('client_product_detail');
});


