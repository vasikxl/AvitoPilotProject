<?php

namespace App\Providers;

use App\Driver\Mysql\ProjectRepository;
use App\Project\ProjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ProjectRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HelperRepositories.php';
        $this->app->bind("App\Project\ProjectRepositoryInterface", "App\Driver\Mysql\ProjectRepository");
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
