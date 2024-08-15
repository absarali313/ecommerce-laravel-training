<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class DeleteCategoryImage
{
    /**
     * Deletes a category image
     * @param Category $category the category against which a image needs to be deleted
     * @return void
     */
   public function handle(Category $category): void
   {
       $category->image_path = null;
       $category->save();
   }
}
