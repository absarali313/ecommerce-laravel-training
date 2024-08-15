<?php

namespace App\Actions\Admin\product;
namespace App\Actions\Admin\Product;

use App\Models\Product;

class DestroyProduct
{
    /**
     * Deletes a product.
     * Set the visibility to false and delete the product.
     * @param  Product $product the product that needs to be deleted
     * @return void
     */
    public function handle(Product $product): void
    {
        // Set visibility to false
        $product->visibility = false;
        $product->save();

        // Delete the product
        $product->delete();
    }
}
