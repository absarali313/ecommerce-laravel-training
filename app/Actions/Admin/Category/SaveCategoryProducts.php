<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SaveCategoryProducts
{
    /**
     * Stores the product associations with the categories
     * @param array $data includes the products array
     * @param Category $category the category against which products are being associated
     */
    public function handle(array $data, Category $category): void
    {
        $category->products()->sync($data);
    }
}
