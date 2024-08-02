<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function destroy(ProductImage $productImage){

       $image = ProductImage::find($productImage->id);
       $image->delete();
        return redirect()->back();

    }
}
