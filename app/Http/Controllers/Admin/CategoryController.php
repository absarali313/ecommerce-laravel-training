<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.category.create', [
            'categories' =>  Category::all(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::setCategory($request->validated());

        return redirect()->route('admin_categories_index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin_categories_index');
    }
}
