<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $admin = Role::create(['name' => 'admin']);
        $normal_user = Role::create(['name' => 'user']);
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01722222222',
            'status' => 'active',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($admin);
        $user = User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '01755555555',
            'status' => 'active',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($normal_user);
    
    }
}
