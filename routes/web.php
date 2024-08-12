<?php

use App\Http\Controllers\Admin\CategoryImageController as AdminCategoryImageController;
use App\Http\Controllers\Admin\ProductProductController as AdminRelatedProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;
use App\Http\Controllers\Admin\SizeController as AdminSizeController;
use App\Http\Controllers\Admin\ArchiveProductController as AdminArchiveProductController;
use App\Http\Controllers\Admin\ArchiveCategoryController as AdminArchiveCategoryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('home');
});

Route::get('redirect-back', function ()
{
    return redirect()->back();
})->name('redirect.back');

Route::middleware(['admin'])->group(function ()
{
    Route::prefix('admin')->group(function ()
    {
        Route::controller(AdminProductController::class)->group(function ()
        {
            Route::get('/products','index')->name('admin_products');
            Route::get('/products/edit/{product}','edit')->name('admin_product_edit');
            Route::get('/products/create', 'create')->name('admin_product_create');
            Route::post('/products', 'store')->name('admin_product_store');
            Route::patch('/products/edit/{product}', 'update')->name('admin_product_update');
            Route::delete('/products/delete/{product}', 'destroy')->name('admin_product_delete');
        });

        Route::controller(AdminProductImageController::class)->group(function ()
        {
            Route::delete('/products/images/delete/{productImage}', 'destroy')->name('admin_product_image_delete');
        });

        Route::controller(AdminSizeController::class)->group(function ()
        {
            Route::post('/products/size/{product}','store')->name('admin_size_store');
            Route::put('/products/size/{size}', 'update')->name('admin_size_update');
            Route::delete('/products/size/{size}', 'destroy')->name('admin_size_destroy');
        });

        Route::controller(AdminCategoryController::class)->group(function ()
        {
            Route::get('/categories','index')->name('admin_categories');
            Route::get('/categories/create','create')->name('admin_category_create');
            Route::get('/categories/edit/{category}','edit')->name('admin_category_edit');
            Route::delete('/categories/{category}','destroy')->name('admin_category_destroy');
            Route::post('/categories','store')->name('admin_category_store');
            Route::patch('/categories/{category}','update')->name('admin_category_update');
        });

        Route::controller(AdminArchiveCategoryController::class)->group(function ()
        {
            Route::get('/categories/archive','index')->name('admin_categories_archive')->withTrashed();
            Route::patch('/categories/archive/restore/{category}','update')->name('admin_category_restore')->withTrashed();
        });

        Route::controller(AdminRelatedProductController::class)->group(function ()
        {
            Route::post('/products/related/{product}', 'store')->name('admin_related_products_store');
            Route::put('/products/related/{product}',  'update')->name('admin_related_products_update');
            Route::delete('/products/related/{product}',  'destroy')->name('admin_related_products_destroy');
        });

        Route::controller(AdminArchiveProductController::class)->group(function ()
        {
            Route::get('/products/archive', 'index')->name('admin_products_archive')->withTrashed();
            Route::patch('/products/restore/{product}',  'update')->name('admin_product_restore')->withTrashed();
        });

        Route::controller(AdminCategoryImageController::class)->group(function ()
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

