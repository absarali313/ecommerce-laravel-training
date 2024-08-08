<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductProduct\StoreProductProductRequest;
use App\Models\Product;
use App\Models\ProductProduct;
use Illuminate\Http\Request;


class ProductProductController extends Controller
{
    public function store(StoreProductProductRequest $request, Product $product)
    {
        $request->validated();

        ProductProduct::create([
            'product_id' => $request->product_id,
            'related_product_id' => $request->Related_id,
        ]);

        return redirect()->back();
    }

    public function update(Request $request,Product $product)
    {
        ProductProduct::updateOrDelete($request, $product);

        return redirect()->back();
    }
}
