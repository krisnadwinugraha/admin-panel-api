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
            'category' => '1',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 2',
            'category' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 3',
            'category' => '3',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 4',
            'category' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 5',
            'category' => '1',
            'content' => 'Lorem ipsum dolor sit',
        ]);

        Blog::create([
            'title' => 'Judul Blog 6',
            'category' => '2',
            'content' => 'Lorem ipsum dolor sit',
        ]);
    }
}
