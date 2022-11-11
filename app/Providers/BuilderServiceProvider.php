<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HelperBuilders.php';
        $this->app->bind("App\ProjectSearchQueryBuilder\ProjectSearchQueryBuilderInterface",
            "App\ProjectSearchQueryBuilder\ProjectSearchQueryBuilder");
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
