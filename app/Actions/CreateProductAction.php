<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class CreateProductAction
{
    /**
     * Checks if the product is visible
     * @return bool
     */
    private function isVisible(): bool
    {
        return $this?->visibility;
    }

    /**
     * Checks if the product is not visible
     * @return bool
     */
    private function isHidden(): bool
    {
        return !$this?->visibility;
    }

    private function getVisibilityStatus(): String
    {
        if($this->isVisible()){
            return 'Active';
        }
        return 'Inactive';
    }


    /**
     * Store images for the product.
     *
     * @param  \App\Models\Product $product
     * @param  array $images
     */
    private function storeImages(Product $product, array $images): void
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                $path = $image->store('product_images');
                $product->images()->create(['image_path' => $path, 'product_id' => $product->id]);
            }
        }
    }

    /**
     * Create or Update a product
     * @param  array $request
     * @param  Product $product
     * @return \App\Models\Product
     */
    public function handle(array $data, Product $product ): Product
    {
        $product->fill($data);
        $product->visibility = $data['visibility'] === 'active';
        $product->save();

        // Handle the product's images if provided
        if (isset($data['images'])) {
            $this->storeImages($product, $data['images']);
        }

        // Handle the product's categories if provided
        if (isset($data['categories'])) {
            $product->categories()->sync($data['categories']);
        } else {
            $product->categories()->detach();
        }

        return $product;
    }
}
