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
        return [
            'product_size_id'=>Size::inRandomOrder()->first()->id,
            'price'=>fake()->randomFloat(2,0,1000),
            'started_at'=>fake()->dateTimeBetween('-60 days', '-30 days'),
            'ended_at'=>fake()->dateTimeBetween('-29 days', 'now'),
        ];
    }
}
