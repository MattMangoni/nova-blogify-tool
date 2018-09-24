<?php

namespace Mattmangoni\NovaBlogifyTool;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mattmangoni\NovaBlogifyTool\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    protected $expectedTables = [
        'categories',
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-blogify-tool');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $this->app->booted(function () {
            $this->routes();

            (new Bootstrap())->injectResources();
        });
    }

    /**
     * Register the tool' s routes .
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-blogify')
            ->group(__DIR__.'/../routes/api.php');
    }
}
