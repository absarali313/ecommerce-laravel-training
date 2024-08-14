<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;
use Illuminate\Http\UploadedFile;

class SaveCategory
{
    /**
     * Creates or updates the category
     * @param array $data
     * @param Category $category
     * @return Category
     */
    public function handle(array $data, Category $category): Category
    {
        // Set category attributes
        $category->name = $data['name'];

        // Store image if provided
        if (isset($data['image'])) {
            $this->storeImage($category, $data['image']);
        }

        // Set parent category if provided
        if ($data['parent']) {
            $parentCategoryId = Category::where('name', $data['parent'])->value('id');
            $category->parent_id = $parentCategoryId;
        }

        // Save the category
        $category->save();

        return $category;
    }

    /**
     * Stores the category image
     * @param UploadedFile $images
     */
    private function storeImage(Category $category, UploadedFile $image): void
    {
        $path = $image->store('category_images', 'public');
        $category->image_path = $path;
        $category->save(); // Save after storing each image path
    }
}
