<?php

namespace App\Providers;

use App\Models\Appsetting;
use App\Models\Postland;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('global', Appsetting::Find(1));
        View::share('global2', Postland::Find(1));
    }
}
