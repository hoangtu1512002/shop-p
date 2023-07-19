<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\Admin\AdminMenuPolicy;
use App\Policies\Admin\CategoryPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->showTemplateByRoles();
        $this->checkPermissionCategory();
    }

    /**
     * Show Template and Menu by Roles
     * 
     * @return void
     */
    private function showTemplateByRoles() 
    {
        Gate::define('view-dashboard', [AdminMenuPolicy::class, 'viewDashboard']);
        Gate::define('view-category', [AdminMenuPolicy::class, 'viewCategory']);
        Gate::define('view-product', [AdminMenuPolicy::class, 'viewProduct']);
        Gate::define('view-user-manager', [AdminMenuPolicy::class, 'viewUserManager']);
    }

     /**
     *  Category permission
     * 
     * @return void
     */
    private function checkPermissionCategory ()
    {
        Gate::define('create-category', [CategoryPolicy::class, 'create']);
        Gate::define('update-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
        Gate::define('selling-category', [CategoryPolicy::class, 'selling']);
    }
}
