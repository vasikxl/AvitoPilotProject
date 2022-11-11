<?php

namespace App\Providers;

use App\Comment\CommentRepositoryInterface;
use App\Driver\Mysql\CommentRepository;
use Illuminate\Support\ServiceProvider;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
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
