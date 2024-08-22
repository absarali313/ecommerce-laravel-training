<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;
use Illuminate\Http\UploadedFile;

class SaveCategory
{
    /**
     * Creates or updates the category
     * Updates the category image
     * Updates the parent category
     * @param array $data provides the data including title, image, and parent category
     * @param Category $category the category to verify if this instance already exists in the database
     * @return Category
     */
    public function handle(array $data, Category $category): Category
    {
        // Set category attributes
        $category->name = $data['name'];
        $category->position = Category::getNewPosition();

        // Store image if provided
        $this->storeImage($category, $data);

        // Set parent category if provided
        $this->storeParent($data['parent'], $category);

        // Save the category
        $category->save();

        return $category;
    }

    /**
     * Stores the category image
     * @param UploadedFile $image the image that needs to be stored
     * @param Category $category the category against which image is to be stored
     */
    private function storeImage(Category $category, array $data): void
    {
        if(isset($data['image'])) {
            $path = $data['image']->store('category_images', 'public');
            $category->image_path = $path;
            $category->save(); // Save after storing each image path
        }
    }

    /**
     * @param $parent
     * @param Category $category
     * @return void
     */
    private function storeParent($parent, Category $category): void
    {
        if ($parent) {
            $parentCategoryId = Category::where('name', $parent)->value('id');
            $category->parent_id = $parentCategoryId;
        }
    }
}
