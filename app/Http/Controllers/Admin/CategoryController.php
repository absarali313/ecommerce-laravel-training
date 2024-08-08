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
        $category = Category::paginate(10);

        return view('admin.category.index', [
            'categories' => $category,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.category.create', [
            'categories' => $categories,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $request->validated();

        $category = Category::setCategory($request->name, $request->parent, $request->images);
        if($request->hasFile('images'))
        {
            $category->storeImage($request->images);
        }

        return redirect()->route('admin_categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin_categories');
    }
}
