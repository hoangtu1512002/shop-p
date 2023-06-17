<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\Admin\AdminMenuPolicy;

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
        $this->checkRole();
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
     *  
     * 
     * @return void
     */
    private function checkRole ()
    {
        Gate::define('isAdmin', function($user) {
            return $user->roles->contains('role_name', 'Admin');
        });

        Gate::define('isUser', function($user) {
            return $user->roles->contains('role_name', 'User');
        });
    }

}
