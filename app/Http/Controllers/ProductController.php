<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::query()->cursorPaginate(8);
        return view('client.index',['products'=>$products]);
    }
    public function show(Product $product)
    {
        return view('client.product-details',['product'=>$product]);
    }
}
