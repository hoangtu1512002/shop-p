<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class CrateCategoryManagementPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permission:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default category management permission';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permissions = collect([
            [
                'permission' => 'category_supper_permission',
                'name' => 'Quyền quản lý danh mục'
            ],

            [
                'permission' => 'create_category',
                'name' => 'Quyền tạo mới danh mục'
            ],

            [
                'permission' => 'update_category',
                'name' => 'Quyền sửa danh muc'
            ],

            [
                'permission' => 'delete_category',
                'name' => 'Quyền xóa danh mục'
            ]
        ]);

        foreach ($permissions as $permission) {
            if (!Permission::where('permission', $permission['permission'])->where('name', $permission['name'])->exists()) {
                Permission::create(['permission' => $permission['permission'], 'name' => $permission['name']]);
            }
        }

        $this->info('Default permissions created successfully.');
    }
}
