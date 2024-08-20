<?php

use App\Http\Controllers\Admin\ArchiveCategoryController;
use App\Http\Controllers\Admin\ArchiveProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;

Route::get('redirect-back', function ()
{
    return redirect()->back();
})->name('redirect.back');

Route::middleware(['admin'])->group(function ()
{
    Route::prefix('admin')->group(function ()
    {
        Route::controller(ProductController::class)->group(function ()
        {
            Route::get('/products','index')->name('admin_products');
            Route::get('/products/edit/{product}','edit')->name('admin_product_edit');
            Route::get('/products/create', 'create')->name('admin_product_create');
            Route::post('/products', 'store')->name('admin_product_store');
            Route::patch('/products/edit/{product}', 'update')->name('admin_product_update');
            Route::delete('/products/delete/{product}', 'destroy')->name('admin_product_delete');
            Route::post('/admin/products/reorder',  'reorder')->name('admin_product_reorder');

        });

        Route::controller(ProductImageController::class)->group(function ()
        {
            Route::delete('/products/images/delete/{productImage}', 'destroy')->name('admin_product_image_delete');
        });

        Route::controller(SizeController::class)->group(function ()
        {
            Route::post('/products/size/{product}','store')->name('admin_size_store');
            Route::put('/products/size/{size}', 'update')->name('admin_size_update');
            Route::delete('/products/size/{size}', 'destroy')->name('admin_size_destroy');
        });

        Route::controller(CategoryController::class)->group(function ()
        {
            Route::get('/categories','index')->name('admin_categories');
            Route::get('/categories/create','create')->name('admin_category_create');
            Route::get('/categories/edit/{category}','edit')->name('admin_category_edit');
            Route::delete('/categories/{category}','destroy')->name('admin_category_destroy');
            Route::post('/categories','store')->name('admin_category_store');
            Route::patch('/categories/{category}','update')->name('admin_category_update');
        });

        Route::controller(ArchiveCategoryController::class)->group(function ()
        {
            Route::get('/categories/archive','index')->name('admin_categories_archive')->withTrashed();
            Route::patch('/categories/archive/restore/{category}','update')->name('admin_category_restore')->withTrashed();
        });

        Route::controller(ProductProductController::class)->group(function ()
        {
            Route::post('/products/related/{product}', 'store')->name('admin_related_products_store');
            Route::put('/products/related/{product}',  'update')->name('admin_related_products_update');
            Route::delete('/products/related/{product}',  'destroy')->name('admin_related_products_destroy');
        });

        Route::controller(ArchiveProductController::class)->group(function ()
        {
            Route::get('/products/archive', 'index')->name('admin_products_archive')->withTrashed();
            Route::patch('/products/restore/{product}', 'update')->name('admin_product_restore')->withTrashed();
        });

        Route::controller(CategoryImageController::class)->group(function ()
        {
            Route::delete('/categories/{category}/image/delete', 'destroy')->name('admin_category_image_delete');
        });
    });
});

Route::middleware('guest')->group(function ()
{
    Route::controller(SessionController::class)->group(function ()
    {
        Route::post('/login', 'store')->name('login');
        Route::get('/login', 'create')->name('login_page');
        Route::post('/logout', 'destroy')->withoutMiddleware('guest')->middleware('auth')->name('logout');
    });

    Route::controller(RegisteredUserController::class)->group(function ()
    {
        Route::post('/register', 'store')->name('register_page');
        Route::get('/register', 'create')->name('register_page');
    });
});


Route::controller(ClientCategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('client_categories');
    Route::get('/categories/{category}', 'show')->name('client_category_products');
});

Route::controller(ClientProductController::class)->group(function () {
    Route::get('/products', 'index')->name('client_products');
    Route::get('/product/{product}', 'show')->name('client_product');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
