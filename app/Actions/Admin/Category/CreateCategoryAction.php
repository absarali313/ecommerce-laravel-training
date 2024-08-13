<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class CreateCategoryAction
{
    public function handle(array $categoryData, Category $category)
    {
        // Set category attributes
        $category->name = $categoryData['name'];

        // Store image if provided
        if (isset($categoryData['image'])) {
            $category->storeImage($categoryData['image']);
        }

        // Set parent category if provided
        if ($categoryData['parent']) {
            $parentCategoryId = Category::where('name', $categoryData['parent'])->value('id');
            $category->parent_id = $parentCategoryId;
        }

        // Save the category
        $category->save();

        return $category;
    }
}
