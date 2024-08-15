<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Category\DeleteCategoryImage;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryImageController extends Controller
{
    public function destroy(Category $category, DeleteCategoryImage $deleteCategoryImageAction)
    {
        $deleteCategoryImageAction->handle($category);

        return redirect()->back();
    }
}
