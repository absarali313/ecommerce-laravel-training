<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ArchiveProductController extends Controller
{
    public function index(Product $product)
    {
        $products=Product::onlyTrashed()->cursorPaginate(8);
        return view('admin.archive_product.archive-index', [
            'products'=>$products,
            'status'=>false,
        ]);
    }

    public function update(Product $product)
    {
        $product=Product::withTrashed()->findOrFail($product);
        $product->restore(); // Restore the soft-deleted product

        return redirect()->route('products.archive')->with('success', 'Product restored successfully!');

    }
}
