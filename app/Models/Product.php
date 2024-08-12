<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

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
        return $this->hasMany(Size::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Compute the sum of stocks
     * from each size of the product
     * @return int
     */
    public function getTotalStock(): int
    {
        return $this->sizes->sum('stock');
    }

    /**
     * Store images for the product.
     * @param  array $images
     */
    public function storeImages(array $images): void
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
     * @param array $categories
     */
    public function associateCategories(array $categories = []): void
    {
        if ($categories) {
            $this->categories()->sync($categories);
        }
    }

    /**
     * Create or Update a product
     * @param  Request $request
     * @return \App\Models\Product
     */
    public function setProduct(Request $request): Product
    {
        $this->fill($request->all());
        $this->save();

        if (array_key_exists('images', $request->all())) {
            $this->storeImages($request->images);
        }

        if (array_key_exists('categories', $request->all())) {
            $this->associateCategories($request['categories']);
        }

        return $this;
    }

    /**
     * Deletes a product.
     * Set the visibility to false
     */
    public function destroyProduct(): void
    {
        $this->visibility = false;
        $this->save();
        $this->delete();
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
        return !$this?->visibility;
    }

    public function getVisibilityStatus(): String
    {
        if($this->isVisible()){
            return 'Active';
        }
        return 'Inactive';
    }
}
