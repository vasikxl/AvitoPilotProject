<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskChangeRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HelperRepositories.php';
        $this->app->bind("App\TaskChange\TaskChangeRepositoryInterface", "App\Driver\Mysql\TaskChangeRepository");
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
