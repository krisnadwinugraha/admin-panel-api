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
            'name' => 'category 1',
            'description' => 'description category 1',
        ]);

        Category::create([
            'name' => 'category 2',
            'description' => 'description category 2',
        ]);

        Category::create([
            'name' => 'category 3',
            'description' => 'description category 3',
        ]);

        Category::create([
            'name' => 'category 4',
            'description' => 'description category 4',
        ]);

        Category::create([
            'name' => 'category 5',
            'description' => 'description category 5',
        ]);

        Category::create([
            'name' => 'category 6',
            'description' => 'description category 6',
        ]);
    }
}
