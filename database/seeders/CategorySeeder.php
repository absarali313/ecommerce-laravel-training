<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(3)->create();
        $products = Product::factory(10)->create();

// Attach products to each category
        $categories->each(function ($category) use ($products) {
            $category->products()->attach($products->pluck('id')->toArray());
        });

    }
}
