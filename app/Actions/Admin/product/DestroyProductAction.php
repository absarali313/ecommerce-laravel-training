<?php

namespace App\Actions\Admin\product;

use App\Models\Product;

class DestroyProductAction
{
    /**
     * Deletes a product.
     * Set the visibility to false and delete the product.
     *
     * @param  \App\Models\Product  $product
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
