<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\product\CreateProductAction;
use App\Actions\Admin\product\DestroyProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    protected $createProductAction, $destroyProductAction;

    public function __construct(CreateProductAction $createProductAction,DestroyProductAction $destroyProductAction)
    {
        $this->createProductAction = $createProductAction;
        $this->destroyProductAction = $destroyProductAction;
    }

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

    public function store(ProductRequest $request, CreateProductAction $createProductAction)
    {
        $product =  (new Product);
        $product = $createProductAction->handle($request->validated(),$product);

        return redirect()->route('admin_product_edit', $product);
    }

    public function update(ProductRequest $request, Product $product, CreateProductAction $createProductAction)
    {
        $product = $createProductAction->handle($request->validated(),$product);

        return redirect()->route('admin_product_edit', $product);
    }

    public function destroy(Product $product, DestroyProductAction $destroyProductAction)
    {
        $destroyProductAction->handle($product);

        return redirect()->route('admin_products');
    }
}
