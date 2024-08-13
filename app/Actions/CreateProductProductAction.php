<?php

namespace App\Actions;

use App\Models\ProductProduct;
use Illuminate\Support\Facades\Hash;

class CreateProductProductAction
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
