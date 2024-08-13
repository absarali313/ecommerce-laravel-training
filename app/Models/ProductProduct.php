<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class ProductProduct extends Model
{
    protected $fillable = [
        'product_id',
        'related_product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeRelatedProduct($query, $product, $relatedProduct): ProductProduct
    {
        return $query->where('product_id', $product)
            ->where('related_product_id', $relatedProduct);
    }
}
