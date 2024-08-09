<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ArchiveCategoryController extends Controller
{
    public function index()
    {
        $categories=Category::onlyTrashed()->simplePaginate(8);

        return view('admin.archive_category.index', [
            'categories'=> $categories,
            'status'=>false,
        ]);
    }

    public function update(Category $category)
    {
        $category=Category::withTrashed()->findOrFail($category->id);
        $category->restore(); // Restore the soft-deleted product

        return redirect()->back();

    }
}
