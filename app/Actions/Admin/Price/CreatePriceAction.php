<?php

namespace App\Actions\Admin\Price;

use App\Models\Price;
use App\Models\Size;

class CreatePriceAction
{
    public function handle(array $data, Size $size, Price $price): Price
    {
        $price->product_size_id = $size->id;
        $price->price = $data['price'];
        $price->started_at = now();

        $price->save();

        return $price;
    }
}
