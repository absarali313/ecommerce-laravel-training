<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::cursorPaginate(8);

        return view('client.category.index',[
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        $products = $category->products()->cursorPaginate(8);

        return view('client.product.index',[
            'products' => $products,
        ]);
    }
}
