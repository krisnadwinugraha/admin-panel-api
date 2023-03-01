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
            'deskripsi' => 'deskripsi product 1',
            'harga' => '20000',
        ]);

        Product::create([
            'name' => 'product 2',
            'deskripsi' => 'deskripsi product 2',
            'harga' => '25000',
        ]);

        Product::create([
            'name' => 'product 3',
            'deskripsi' => 'deskripsi product 3',
            'harga' => '40000',
        ]);

        Product::create([
            'name' => 'product 4',
            'deskripsi' => 'deskripsi product 4',
            'harga' => '50000',
        ]);

        Product::create([
            'name' => 'product 5',
            'deskripsi' => 'deskripsi product 5',
            'harga' => '60000',
        ]);

        Product::create([
            'name' => 'product 6',
            'deskripsi' => 'deskripsi product 6',
            'harga' => '60000',
        ]);
    }
}
