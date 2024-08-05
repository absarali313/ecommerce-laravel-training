<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'parent' => 'required',
            'images' => 'nullable',
        ]);

        $parentCategoryId = Category::where('name', $request->parent)->value('id');
        if ($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image)
            {
                $path = $image->store('product_images');
            }
        }
        Category::create([
            'name' => $request->name,
            'parent_id' => $parentCategoryId,
        ]);

        return redirect()->route('admin.category.index');
    }

}
