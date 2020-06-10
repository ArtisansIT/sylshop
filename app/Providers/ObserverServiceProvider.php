<?php

namespace App\Providers;

use App\Admin\Category;
use App\Observers\categoryObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
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
        Category::observe(categoryObserver::class);
    }
}
