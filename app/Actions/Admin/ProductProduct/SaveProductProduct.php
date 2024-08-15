<?php

namespace App\Actions\Admin\ProductProduct;

use App\Models\Product;
use App\Models\ProductProduct;

class SaveProductProduct
{
    /**
     * adds or removes the related product.
     *
     * @param array $data the data including related product id
     * @param ProductProduct|null $product the product against which related product is being added
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
