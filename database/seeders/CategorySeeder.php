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
        for($i = 0; $i < 3; $i++) {
            Category::factory(1)->create();
        }
        $products = Product::factory(10)->create();

// Attach products to each category
        Category::each(function ($category) use ($products) {
            $category->products()->attach($products->pluck('id')->toArray());
        });

    }
}
