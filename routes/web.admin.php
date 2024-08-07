<?php

use App\Http\Controllers\Admin\ProductProductController as AdminRelatedProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;
use App\Http\Controllers\Admin\SizeController as AdminSizeController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::controller(AdminProductController::class)->group(function () {

            Route::get('/products', 'index')->name('admin.products.index');
            Route::get('/products/edit/{product}', 'edit');
            Route::get('/products/create', 'create');
            Route::post('/products', 'store')->name('products.store');
            Route::patch('/products/edit/{product}', 'update')->name('products.update');
            Route::delete('/products/delete/{product}', 'destroy')->name('products.delete');
            Route::get('/products/archive', 'archive_index')->name('products.archive');
            Route::patch('/products/restore/{id}', 'archive_r')->name('products.archive.restore');

        });

        Route::delete('/products/images/delete/{productImage}', [AdminProductImageController::class, 'destroy'])->name('products.images.delete');

        Route::controller(AdminSizeController::class)->group(function () {

            Route::post('/products/size/{product}}', 'store')->name('products.size.store');
            Route::put('/products/size/{size}', 'update')->name('products.size.update');
        });

        Route::controller(AdminCategoryController::class)->group(function () {

            Route::get('/categories', 'index')->name('admin.category.index');
            Route::get('/categories/create', 'create')->name('admin.category.create');
            Route::delete('/categories/{category}', 'destroy')->name('admin.category.destroy');
            Route::post('/categories', 'store')->name('admin.category.store');
        });

        Route::controller(AdminRelatedProductController::class)->group(function () {

            Route::post('/products/related/{product}', 'store')->name('products.related.store');
            Route::put('/products/related/{product}', 'update')->name('products.related.update');
        });
    });

});
