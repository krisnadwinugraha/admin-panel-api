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
            'deskripsi' => 'deskripsi category 1',
        ]);

        Category::create([
            'name' => 'category 2',
            'deskripsi' => 'deskripsi category 2',
        ]);

        Category::create([
            'name' => 'category 3',
            'deskripsi' => 'deskripsi category 3',
        ]);

        Category::create([
            'name' => 'category 4',
            'deskripsi' => 'deskripsi category 4',
        ]);

        Category::create([
            'name' => 'category 5',
            'deskripsi' => 'deskripsi category 5',
        ]);
    }
}
