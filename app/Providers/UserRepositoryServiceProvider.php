<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HelperRepositories.php';
        $this->app->bind("App\User\UserRepositoryInterface", "App\Driver\Mysql\UserRepository");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/courier.php' => config_path('courier.php'),
        ]);
    }
}
