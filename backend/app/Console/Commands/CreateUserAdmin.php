<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class CreateUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a super admin user and roles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $superAdmin  = User::create([
            'email' => 'hoangtu1512002@gmail.com',
            'password' => Hash::make('1512002'),
        ]);

        $superAdminRole = Role::create([
            'role' => 'Admin',
            'name' => 'Quản trị viên'
        ]);

        $manageUsersPermission = Permission::create([
            'permission' => 'supper_permission',
            'name' => 'Quyền quản trị viên'
        ]);

        $superAdmin->roles()->attach($superAdminRole->id);
        $superAdmin->permissions()->attach($manageUsersPermission->id);
        $this->info('Super admin user and roles created successfully.');
    }
}
