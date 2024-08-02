<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(1)->create();

//         Size::factory(1)->create();
//         User::create([
//             'name' => 'Admin',
//             'email' => 'admin@admin.com',
//             'password' => '123',
//             'is_admin' => true,
//         ]);

        $this->call(ProductSeeder::class);
//        $this->call(SizeSeeder::class);
//        $this->call(PriceSeeder::class);

//        $this->call(ProductImageSeeder::class);

    }
}
