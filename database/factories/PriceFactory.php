<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return
            [
            'product_size_id'=>Size::factory(),
            'price'=>fake()->randomFloat(2,0,1000),
            'started_at'=>now()->subDays(30),
            'finished_at'=>now()->addDays(30),
            ];
    }
}
