<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'title' => 'How To Eat More Healthy',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Benefit Of Drink Water',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Fruit And Diet',
            'category_id' => '4',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Make Your Clothes Look Good',
            'category_id' => '3',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Food Recommendation Today',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Drink Recommendation Today',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);
    }
}
