<?php

namespace App\Actions\Admin\ProductProduct;

use App\Models\ProductProduct;

class SaveProductProduct
{
    /**
     * Create or Update a product.
     *
     * @param   array $data
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function handle(array $data, ?ProductProduct $product=null): void
    {
        if($product)
        {
            $product->fill($data);
            $product->save();
        }
    }
}
