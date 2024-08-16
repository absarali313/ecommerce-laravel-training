<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

class SaveProductCategories
{
    public function handle(array $data, Product $product)
    {
        $product->categories()->sync($data);
    }
}
