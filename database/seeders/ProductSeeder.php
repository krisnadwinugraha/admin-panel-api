<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'product 1',
            'description' => 'description product 1',
            'price' => '20000',
            'image' => 'pizza.jpg',
        ]);

        Product::create([
            'name' => 'product 2',
            'description' => 'description product 2',
            'price' => '25000',
            'image' => 'pizza.jpg',
        ]);

        Product::create([
            'name' => 'product 3',
            'description' => 'description product 3',
            'price' => '40000',
            'image' => 'pizza.jpg',
        ]);

        Product::create([
            'name' => 'product 4',
            'description' => 'description product 4',
            'price' => '50000',
            'image' => 'pizza.jpg',
        ]);

        Product::create([
            'name' => 'product 5',
            'description' => 'description product 5',
            'price' => '60000',
            'image' => 'pizza.jpg',
        ]);

        Product::create([
            'name' => 'product 6',
            'description' => 'description product 6',
            'price' => '60000',
            'image' => 'pizza.jpg',
        ]);
    }
}
