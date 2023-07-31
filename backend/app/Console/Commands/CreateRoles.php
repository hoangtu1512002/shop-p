<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roles = collect([
            [
                'role' => 'Category_management',
                'name' => 'Quản lý danh mục'
            ],

            [
                'role' => 'Product_management',
                'name' => 'Quản lý sản phẩm'
            ],

            [
                'role' => 'User_management',
                'name' => 'Quản lý người dùng'
            ],

            [
                'role' => 'Customer',
                'name' => 'Khách hàng'
            ]
        ]);

        foreach ($roles as $role) {
            if (!Role::where('role', $role['role'])->where('name', $role['name'])->exists()) {
                Role::create(['role' => $role['role'] , 'name' => $role['name']]);
            }
        }

        $this->info('Default roles created successfully.');
    }
}
