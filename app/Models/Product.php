<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Scalar\String_;

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
     *
     * @return int
     */
    public function getTotalStock(): int
    {
        return $this->sizes->sum('stock');
    }

    /**
     * Set the visibility status of product in boolean type
     *
     * @param  String  $status
     * @return bool
     */
    public function setVisibility(String $status): bool
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
    public function storeImages($images): void
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
    public function associateCategories($categories): void
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
    public static function setProduct($productData , ?Product $product = null): Product
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

    /**
     * Deletes a product.
     * Set the visibility to false
     * @param Product $product
     * @return void
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
        return isset($this) && $this->visibility;
    }

    /**
     * Checks if the product is not visible
     * @return bool
     */
    public function isHidden(): bool
    {
        return isset($this) && !$this->visibility;
    }

    public function getVisibilityStatus(): String
    {
        if($this->isVisible()){
            return 'Active';
        }
        return 'Inactive';
    }
}
