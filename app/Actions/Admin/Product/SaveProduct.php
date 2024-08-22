<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

class SaveProduct
{
    /**
     * Create or Update a product
     * @param  array $request includes the data for product instance such as title, description and product images
     * @param  Product $product the product instance to make sure if it already exists in the database
     * @return Product
     */
    public function handle(array $data, Product $product ): Product
    {
        $this->setProduct($product, $data);

        // Handle the product's images if provided
        if (isset($data['images'])) {
            $this->storeImages($product, $data['images']);
        }

        return $product;
    }

    /**
     * Store images for the product.
     *
     * @param  Product $product the product against which the image is being stored
     * @param  array $images an array of images that will be stored
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
     * @param Product $product
     * @param array $data
     * @return void
     */
    public function setProduct(Product $product, array $data): void
    {
        $product->fill($data);
        $product->visibility = $data['visibility'];
        $product->save();
    }
}
