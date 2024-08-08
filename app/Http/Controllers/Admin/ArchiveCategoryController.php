<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ArchiveCategoryController extends Controller
{
    public function index(Category $category)
    {
        $categories=Category::onlyTrashed()->simplePaginate(8);

        return view('admin.archive_product.archive-index', [
            'categories'=> $categories,
            'status'=>false,
        ]);
    }

    public function update($category)
    {
        $category=Category::withTrashed()->findOrFail($category);
        $category->restore(); // Restore the soft-deleted product

        return redirect()->route('admin_categories_archive')->with('success', 'Category restored successfully!');

    }
}
