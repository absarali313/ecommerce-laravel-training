<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;
use App\Http\Controllers\Admin\SizeController as AdminSizeController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::middleware(['admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::controller(AdminProductController::class)->group(function () {

            Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
            Route::get('/products/edit/{product}', [AdminProductController::class, 'edit']);
            Route::get('/products/create', [AdminProductController::class, 'create']);
            Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
            Route::patch('/products/edit/{product}', [AdminProductController::class, 'update'])->name('products.update');
            Route::delete('/products/delete/{product}', [AdminProductController::class, 'destroy'])->name('products.delete');
            Route::get('/products/archive', [AdminProductController::class, 'archive_index'])->name('products.archive');

        });

        Route::delete('/products/images/delete/{productImage}', [AdminProductImageController::class, 'destroy'])->name('products.images.delete');

        Route::controller(AdminSizeController::class)->group(function () {

            Route::post('/products/size/{product}}', [AdminSizeController::class, 'store'])->name('products.size.store');
            Route::put('/products/size/{size}', [AdminSizeController::class, 'update'])->name('products.size.update');
        });

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

            Route::post('/register', 'store');
            Route::get('/register', 'create');

        });
    });
});

