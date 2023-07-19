<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Menu;
use Illuminate\Support\Facades\View;

class MenuComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layout.sidebar', Menu::class);
    }
}
