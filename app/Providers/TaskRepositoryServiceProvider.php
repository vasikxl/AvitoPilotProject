<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HelperRepositories.php';
        $this->app->bind("App\Task\TaskRepositoryInterface", "App\Driver\Mysql\TaskRepository");
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
