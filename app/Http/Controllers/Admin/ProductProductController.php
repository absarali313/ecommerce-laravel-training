<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductProduct\ProductProductRequest;
use App\Models\Product;
use App\Models\ProductProduct;


class ProductProductController extends Controller
{
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
