<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Product\CreateProduct;
use App\Actions\Admin\Product\DestroyProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::paginate(10),
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(ProductRequest $request, CreateProduct $createProductAction)
    {
        $product =  (new Product);
        $product = $createProductAction->handle($request->validated(),$product);

        return to_route('admin_product_edit', $product);
    }

    public function update(ProductRequest $request, Product $product, CreateProduct $createProductAction)
    {
        $product = $createProductAction->handle($request->validated(),$product);

        return to_route('admin_product_edit', $product);
    }

    public function destroy(Product $product, DestroyProduct $destroyProductAction)
    {
        $destroyProductAction->handle($product);

        return to_route('admin_products');
    }
}
