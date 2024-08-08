<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // Create a new Product instance if needed
            'order' => $this->faker->numberBetween(1, 100),
            'image_path' => 'http://picsum.photos/seed/{{rand(0,10000)}}/100/100'
        ];
    }
}
