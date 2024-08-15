<?php

namespace App\Actions\Admin\Price;

use App\Models\Price;
use App\Models\Size;

class CreatePrice
{
    /**
     * Create price for a size
     * @param array $data includes the data for size and its price
     * @param Size $size The size variant for which price is being saved
     * @param Price $price The price against a specific size variant
     * @return Price
     */
    public function handle(array $data, Size $size, Price $price): Price
    {
        $price->product_size_id = $size->id;
        $price->price = $data['price'];
        $price->started_at = now();

        $price->save();

        return $price;
    }
}
