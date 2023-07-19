<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class CreatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default permissions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permissions = [
            // category
            'category_management',
            'create_category',
            'update_category',
            'delete_category',
            'stop_selling_category',

            // product
            'product_management',


            // user
            'user_management',

            // 
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('permission_name', $permission)->exists()) {
                Permission::create(['permission_name' => $permission]);
            }
        }

        $this->info('Default permissions created successfully.');
    }
}
