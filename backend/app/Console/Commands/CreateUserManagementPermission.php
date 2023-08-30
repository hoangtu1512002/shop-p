<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;

class CreateUserManagementPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permission:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default user management permission';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permissions = collect([
            [
                'permission' => 'create_user',
                'name' => 'Quyền tạo mới tài khoản'
            ],

            [
                'permission' => 'update_user',
                'name' => 'Quyền sửa tài khoản'
            ],

            [
                'permission' => 'update_info_user',
                'name' => 'Quyền thêm thông tin tài khoản'
            ],

            [
                'permission' => 'disable_user',
                'name' => 'Quyền vô hiệu hóa tài khoản'
            ],

            [
                'permission' => 'delete_user',
                'name' => 'Quyền xóa tài khoản'
            ]
        ]);

        $this->createPermission(new Permission, $permissions);
    }
}
