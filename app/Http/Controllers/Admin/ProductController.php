<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index',[
            'products' =>  Product::orderBy('sort_order')->get()
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

    public function store(ProductRequest $request)
    {
        $product = (new Product())->setProduct($request);

        return redirect()->route('admin_product_edit', $product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->setProduct($request);

        return redirect()->route('admin_product_edit', $product);
    }

    public function destroy(Product $product)
    {
        $product->destroyProduct();

        return redirect()->route('admin_products');
    }
}
