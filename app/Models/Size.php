<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'stock',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class,'product_size_id');
    }

    /**
     * Returns the current price of a product size
     * @return Price|null
     */
    public function getCurrentPrice(): Price | null
    {
        return $this->prices()->orderByDesc('started_at')->first();
    }

    /**
     * deletes a size
     */
    public function destroySize(): void
    {
        $this->delete();
    }
}

