<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'related_product_id',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeRelatedProduct($query, $product,$relatedProduct) : ProductProduct
    {
        return $query->where('product_id', $product)
            ->where('related_product_id', $relatedProduct);
    }
}
