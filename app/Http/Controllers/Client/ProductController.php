<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::cursorPaginate(8);
        return view('client.product.index', [
            'products' => $products,
        ]);
    }

    public function show(Product $product)
    {
        return view('client.product.show', [
            'product' => $product,
        ]);
    }

    public function home()
    {
        $products = Product::cursorPaginate(8);
        return view('client.home', [
            'products' => $products,
        ]);
    }
}
