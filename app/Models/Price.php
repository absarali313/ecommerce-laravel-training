<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable=[
        'price',
        'started_at',
        'ended_at',
        'product_size_id',
    ];

    public function size() : BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * @param int $productSizeId
     * @param int $price
     * @return Price
     */
    public static function createPrice(int $productSizeId, int $price): Price
    {
        return Price::create([
            'product_size_id' => $productSizeId,
            'price' => $price,
            'started_at' => now(),
        ]);
    }

}
