<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::cursorPaginate(8);

        return view('client.home.index', [
            'products' => $products,
        ]);
    }
}
