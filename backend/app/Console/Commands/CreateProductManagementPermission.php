<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class CreateProductManagementPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permission:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default product management permission';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permissions = collect([
            [
                'permission' => 'create_product',
                'name' => 'Quyền tạo mới sản phẩm'
            ],

            [
                'permission' => 'update_product',
                'name' => 'Quyền sửa sản phẩm'
            ],

            [
                'permission' => 'delete_product',
                'name' => 'Quyền xóa sản phẩm'
            ]
        ]);

        $this->createPermission(new Permission, $permissions);
    }
}
