<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin  = User::create([
            'email' => 'hoangtu1512002@gmail.com',
            'password' => Hash::make('1512002'),
        ]);

        $superAdminRole = Role::create([
            'role_name' => 'Admin',
        ]);

        
        $manageUsersPermission = Permission::create([
            'permission_name' => 'supper_permission',
        ]);

        $superAdmin->roles()->attach($superAdminRole->id);
        $superAdmin->permissions()->attach($manageUsersPermission->id);
    }
}
