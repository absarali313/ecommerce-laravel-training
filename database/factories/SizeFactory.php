<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'xs',
            'sm',
            'xl',
            'xxl',
        ];

        return [
            'product_id' => Product::factory(),
            'title' => $titles[array_rand($titles)],
            'stock' => fake()->numberBetween(1, 10),
        ];
    }
}
