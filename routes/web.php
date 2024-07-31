<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});




Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
//
//Route::middleware(['admin'])->group(function () {
//
//Route::get('/dashboard', function () {
//    return view('admin');
//});
//});

Route::middleware('guest')->group(function () {
    Route::controller(SessionController::class)->group(function () {

        Route::post('/login', 'store');
        Route::get('/login', 'create');
        Route::post('/logout', 'destroy')->withoutMiddleware('guest')->middleware('auth');
    });

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::post('/register', 'store')->name('register');
        Route::get('/register', 'create')->name('register_form');
    });
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('client_categories');
    Route::get('/categories/{category}', 'show')->name('client_category_products');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/products', 'index')->name('client_products');
    Route::get('/product/{product}', 'show')->name('client_product');
});


