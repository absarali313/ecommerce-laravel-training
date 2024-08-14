<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class DeleteCategoryImage
{
    /**
     * Deletes a categpry
     * @param Category $category
     * @return void
     */
   public function handle(Category $category): void
   {
       $category->image_path = null;
       $category->save();
   }
}
