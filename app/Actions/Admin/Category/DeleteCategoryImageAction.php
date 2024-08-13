<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class DeleteCategoryImageAction
{
   public function handle(Category $category)
   {
       $category->image_path = null;
       $category->save();
   }
}
