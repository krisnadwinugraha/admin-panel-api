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
            'title' => 'Judul Blog 1',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 2',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 3',
            'category_id' => '3',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 4',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 5',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 6',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);
    }
}
