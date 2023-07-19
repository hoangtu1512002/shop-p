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
    protected $signature = 'roles:create';

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
        $roles = [
            'Category_management',
            'Product_management',
            'User_management'
        ];

        foreach ($roles as $role) {
            if (!Role::where('role_name', $role)->exists()) {
                Role::create(['role_name' => $role]);
            }
        }

        $this->info('Default permissions created successfully.');
    }
}
