<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProduct;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductProduct\ProductProductRequest;


class ProductProductController extends Controller
{
    public function store(ProductProductRequest $request)
    {
        (new ProductProduct())->setRelatedProduct($request);

        return redirect()->back();
    }

    public function update(ProductProductRequest $request, Product $product)
    {
        (ProductProduct::where('related_product_id', $product->id)
            ->where('related_product_id', $product->id)
            ->firstOrFail())
            ->setRelatedProduct($request);

        return redirect()->back();
    }

    public function destroy(ProductProductRequest $request, Product $product)
    {
        (ProductProduct::where('related_product_id', $product->id)
            ->where('related_product_id', $product->id)
            ->firstOrFail())
            ->destroyRelatedProduct();

        return redirect()->back();
    }
}
