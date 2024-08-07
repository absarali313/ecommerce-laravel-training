<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ArchiveProductController extends Controller
{
    public function index(Product $product)
    {
        $products=Product::onlyTrashed()->get();

        return view('admin.product.archive-index', [
            'products'=>$products,
            'status'=>false,
        ]);
    }

    public function restore($id)
    {
        $product=Product::withTrashed()->findOrFail($id);
        $product->restore(); // Restore the soft-deleted product

        return redirect()->route('products.archive')->with('success', 'Product restored successfully!');

    }
}
