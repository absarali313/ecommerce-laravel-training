<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    public function destroy(ProductImage $productImage)
    {
       $productImage->delete();

        return redirect()->back();

    }
}
