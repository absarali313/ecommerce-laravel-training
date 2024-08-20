<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

class SaveProductCategories
{
    /**
     * Stores the product associations with the categories
     * @param array $data includes the category array
     * @param Product $product the product against which categories are being associated
     */
    public function handle(array $data, Product $product): void
    {
        $product->categories()->sync($data);
    }
}
