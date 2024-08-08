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
        $products = Product::paginate(10);

        return view('admin.product.index', [
            'products' => $products,
            'status'=>true,
        ]);
    }

    public function edit(Request $request, Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'selectedCategories' => $product->categories,
            'productSizes' => $product->sizes,
            'relatedProducts' => $product->relatedProducts,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $product = Product::setProduct($validatedData);

        return redirect()->route('admin_products_edit', $product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        Product::setProduct($validatedData, $product);

        return redirect("/admin/products/edit/$product->id");
    }

    public function destroy(Product $product)
    {
        $product->destroyProduct();

        return redirect("/admin/products");
    }
}
