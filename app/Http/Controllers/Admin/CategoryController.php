<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Category\SaveCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create', [
            'categories' => Category::all(),
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'categories' => Category::all(),
            'category' => $category,
        ]);
    }
}
