<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'user 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'user 3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'user 4',
            'email' => 'user4@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'user 5',
            'email' => 'user5@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'user 6',
            'email' => 'user6@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
