<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductProduct\ProductProductRequest;
use App\Models\Product;
use App\Models\ProductProduct;
use Illuminate\Http\Request;


class ProductProductController extends Controller
{
    public function store(ProductProductRequest $request, Product $product)
    {
        ProductProduct::setRelatedProduct($request->validated());

        return redirect()->back();
    }

    public function update(ProductProductRequest $request, Product $product)
    {
        ProductProduct::updateOrDelete($request->validated(), $product);

        return redirect()->back();
    }
}
