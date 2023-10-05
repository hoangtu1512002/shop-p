<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class CreateCategoryManagementPermission extends Command
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

        $this->createPermission(new Permission, $permissions);
    }
}
