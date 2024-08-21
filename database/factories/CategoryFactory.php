<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'image_path' => $this->faker->imageUrl(),
            // Position will be set to the same value as the id after creation
        ];
    }

    // After the model is created
    public function configure()
    {
        return $this->afterCreating(function ($model) {
            // Set the position to be the same as the id
            $model->update(['position' => $model->id - 1]);
        });
    }
}
