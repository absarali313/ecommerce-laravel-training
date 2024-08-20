<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'Visibility',
        'sort_order'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_product');
    }

    public function relatedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_products','product_id','related_product_id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function prices(): HasManyThrough
    {
        return $this->hasManyThrough(Price::class,Size::class, 'product_id', 'product_size_id');
    }

    /**
     * Compute the sum of stocks
     * from each size of the product
     *
     * @return int
     */
    public function getTotalStock(): int
    {
        return $this->sizes->sum('stock');
    }

    /**
     * Checks if the product is visible
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this?->visibility;
    }

    /**
     * Checks if the product is not visible
     * @return bool
     */
    public function isHidden(): bool
    {
        return !$this?->isVisible();
    }

    public function getVisibilityStatus(): String
    {
        if($this->isVisible()){
            return 'Active';
        }
        return 'Inactive';
    }

    public function scopeCurrentPrice()
    {
        return $this->sizes()->with(['prices' => function ($query) {
            $query->where('started_at', '<=', now())
                ->orderBy('started_at', 'desc')
                ->limit(1);
        }]);
    }

    /**
     * Returns the lowest price from different variations of product
     * @return Price|null
     */
    public function getSmallestPriceAttribute(): Price | null
    {
        // Fetch the minimum price among all sizes related to the product
        $smallestPrice = $this->prices()
            ->orderByDesc('started_at')
            ->first();

        return $smallestPrice ?? null;
    }
}
