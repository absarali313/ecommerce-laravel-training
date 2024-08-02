<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create 20 products
        $products = Product::factory()->count(18)->create();

        // Establish relationships
        foreach ($products as $product) {
            // Randomly attach related products
            $relatedProducts = $products->random(rand(1, 5))->pluck('id')->toArray();

            // Avoid self-referencing
            $relatedProducts = array_diff($relatedProducts, [$product->id]);

            $product->relatedProducts()->attach($relatedProducts);
        }

        $products->each(function ($product) {
            ProductImage::factory(1)->create(['product_id' => $product->id]);
        });


        foreach ($products as $product) {
           $size= Size::factory(4)->create([
                'product_id' => $product->id,
            ]);

           $size->each(function ($size) {
                Price::factory(2)->create([
                    'product_size_id' => $size->id,
                ]);
           });
        }
//        $this->call(ProductImageSeeder::class);
    }
}
