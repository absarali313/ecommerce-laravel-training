<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateProductProductAction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProduct;
use App\Http\Requests\Admin\ProductProduct\ProductProductRequest;


class ProductProductController extends Controller
{

    protected $createProductProductAction;

    public function __construct(CreateProductProductAction $createProductProductAction)
    {
        $this->createProductProductAction = $createProductProductAction;
    }

    public function store(ProductProductRequest $request)
    {
        $productProduct = new ProductProduct();
        $this->createProductProductAction->handle($request->validated(), $productProduct);

        return redirect()->back();
    }

    public function update(ProductProductRequest $request, Product $product)
    {
        $productProduct = ProductProduct::where('related_product_id', $product->id)
                                        ->where('related_product_id', $product->id)
                                        ->firstOrFail();
        $this->createProductProductAction->handle($request->validated(), $productProduct);

        return redirect()->back();
    }

    public function destroy(ProductProductRequest $request, Product $product)
    {
        $productProduct = ProductProduct::where('related_product_id', $product->id)
                                        ->where('related_product_id', $product->id)
                                        ->firstOrFail();
        $productProduct->delete();

        return redirect()->back();
    }
}
