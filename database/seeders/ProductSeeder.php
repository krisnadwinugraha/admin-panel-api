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
            'name' => 'Pizza',
            'description' => 'Pizza with a lot of toppings you can choose',
            'price' => '20',
            'image' => 'pizza.jpg',
        ]);

        Product::create([
            'name' => 'Orange',
            'description' => '1 Kg of Orange',
            'price' => '2',
            'image' => 'orange.jpg',
        ]);

        Product::create([
            'name' => 'Cake',
            'description' => 'Cake with your choice of topping',
            'price' => '20',
            'image' => 'cake.png',
        ]);

        Product::create([
            'name' => 'Peanuts',
            'description' => '1 Kg of Peanuts',
            'price' => '2',
            'image' => 'peanuts.jpg',
        ]);

        Product::create([
            'name' => 'Strawberry',
            'description' => '1 Kg of Strawberry',
            'price' => '10',
            'image' => 'strawberry.jpg',
        ]);

        Product::create([
            'name' => 'Tomato',
            'description' => '1 Kg of Tomato',
            'price' => '5',
            'image' => 'tomato.jpg',
        ]);
    }
}
