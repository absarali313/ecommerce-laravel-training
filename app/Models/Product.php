<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Query\Builder;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'Visibility'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_product');
    }

    public function relatedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_product','product_id','related_product_id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class,  'product_id',);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function prices(): HasManyThrough
    {
        return $this->throughSizes()->hasPrices();
    }

    public function getTotalStock()
    {
        return $this->sizes->sum('stock');
    }

    /**
     * Set the visibility status of product in boolean type
     *
     * @param  String  $status
     * @return bool
     */
    public function setVisibility(String $status) : bool
    {
        if ($status == ('inactive'))
        {
            return false;
        }
        return true;
    }

    /**
     * Store images for the product.
     *
     * @param  \Illuminate\Http\UploadedFile[]  $images
     */
    public function storeImages($images)
    {
        if ($images) {
            foreach ($images as $image) {
                $path = $image->store('product_images');
                $this->images()->create(['image_path' => $path, 'product_id' => $this->id]);
            }
        }
    }

    /**
     * Associate categories with the product in pivot table.
     *
     * @param array $categories
     */
    public function associateCategories($categories)
    {
        if ($categories) {
            $this->categories()->sync($categories);
        }
    }

    /**
     * Create or Update a product.
     * if there is no product associated with the id then create
     * otherwise update existing product
     * @param  array  $productData
     * @param  Product  $product
     * @return \App\Models\Product
     */
    public static function setProduct($productData , ?Product $product = null) : Product
    {
        if ($product) {
            // Update existing product
            $product = self::findOrFail($product->id);
            $product->update([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'Visibility' => (new self)->setVisibility($productData['visibility']),
            ]);
        } else {
            // Create new product
            $product = self::create([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'Visibility' => (new self)->setVisibility($productData['visibility']),
            ]);
        }

        if (array_key_exists('images', $productData)) {
            $product->storeImages($productData['images']);
        }

        if (array_key_exists('categories', $productData)) {
            $product->associateCategories($productData['categories']);
        } else {
            $product->categories()->detach(Category::all()->pluck('id')->toArray());
        }

        return $product;
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
