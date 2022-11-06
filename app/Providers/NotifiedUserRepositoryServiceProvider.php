<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NotifiedUserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HelperRepositories.php';
        $this->app->bind("App\NotifiedUsers\NotifiedUserRepositoryInterface", "App\Driver\Mysql\NotifiedUserRepository");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
