<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Food',
            'description' => 'Food Category',
        ]);

        Category::create([
            'name' => 'Drink',
            'description' => 'Drink Category',
        ]);

        Category::create([
            'name' => 'Apparel',
            'description' => 'Cloth, Pants, Jacket Category',
        ]);

        Category::create([
            'name' => 'Fruit',
            'description' => 'Fruit Category',
        ]);

        Category::create([
            'name' => 'Vegetable',
            'description' => 'Vegetable Category',
        ]);

        Category::create([
            'name' => 'Other',
            'description' => 'Other Category Not Listed Here',
        ]);
    }
}
