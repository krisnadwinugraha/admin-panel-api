<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $role = Role::create(['name' => 'User']);

        $permissions = Permission::pluck('id','id')->all();
    
        $role->syncPermissions($permissions);
    
        $user->assignRole([$role->name]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();
    
        $role->syncPermissions($permissions);
    
        $admin->assignRole([$role->name]);
    }
}
