<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ArchiveProductController extends Controller
{
    public function index(Product $product)
    {
        $products=Product::onlyTrashed()->simplePaginate(8);

        return view('admin.archive_product.archive-index', [
            'products'=>$products,
            'status'=>false,
        ]);
    }

    public function update($product)
    {
        $product=Product::withTrashed()->findOrFail($product);
        $product->restore(); // Restore the soft-deleted product

        return redirect()->route('admin_products_archive')->with('success', 'Product restored successfully!');

    }
}
