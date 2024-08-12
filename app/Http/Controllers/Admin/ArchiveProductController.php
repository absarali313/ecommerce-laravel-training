<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ArchiveProductController extends Controller
{
    public function index()
    {
        $products=Product::onlyTrashed()->simplePaginate(8);

        return view('admin.product.archive.index', [
            'products'=>$products,
        ]);
    }

    public function update(Product $product)
    {
        $product->restore(); // Restore the soft-deleted product

        return redirect()->route('admin_products_archive')->with('success', 'Product restored successfully!');
    }
}
