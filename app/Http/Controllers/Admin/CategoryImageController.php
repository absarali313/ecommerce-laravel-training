<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductImage;

class CategoryImageController extends Controller
{
    public function destroy(Category $category)
    {
        $category->image_path = null;
        $category->save();

        return redirect()->back();
    }
}
