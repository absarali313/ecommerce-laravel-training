<?php
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

Route::get('/', function () {
    return view('home');
});

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
            Route::post('/products/size/{product}}','store')->name('admin_size_store');
            Route::put('/products/size/{size}', 'update')->name('admin_size_update');
            Route::delete('/products/size/{size}', 'destroy')->name('admin_size_destroy');
        });

        Route::controller(AdminCategoryController::class)->group(function () {

            Route::get('/categories','index')->name('admin_categories');
            Route::get('/categories/create','create')->name('admin_category_create');
            Route::delete('/categories/{category}','destroy')->name('admin_category_destroy');
            Route::post('/categories','store')->name('admin_category_store');
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
            Route::patch('/products/restore/{id}',  'update')->name('admin_restore_archive')->withTrashed();
        });
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

