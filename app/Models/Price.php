<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_size_id',
        'price',
        'started_at',
        'ended_at',
        'product_size_id',
    ];

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * @param Request $request
     * @param Size $productSize
     * @return Price
     */
    public function setPrice(Request $request, Size $productSize): Price
    {
        $this->product_size_id = $productSize->id;
        $this->price = $request->price;
        $this->started_at = now();
        $this->save();

        return $this;
    }
}
