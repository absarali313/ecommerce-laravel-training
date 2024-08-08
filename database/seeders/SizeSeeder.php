<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes=Size::factory(7)->create();
        $sizes->each(function ($size)
        {
            Price::factory(2)->create([
                'product_size_id' => $size->id,
            ]);
        });
    }
}
