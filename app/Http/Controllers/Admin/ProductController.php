<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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

    public function store(ProductRequest $request)
    {
        $product = (new Product())->setProduct($request);

        return redirect()->route('admin_product_edit', $product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product= (Product::findOrFail($product->id))->setProduct($request);
        Product::setProduct($request->validated(), $product);

        return redirect("/admin/products/edit/$product->id");
    }

    public function destroy(Product $product)
    {
        $product->destroyProduct();

        return redirect("/admin/products");
    }
}
