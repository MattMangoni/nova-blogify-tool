<?php

namespace Mattmangoni\NovaBlogifyTool;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mattmangoni\NovaBlogifyTool\Resources\Category;
use Mattmangoni\NovaBlogifyTool\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-blogify-tool');

        $this->app->booted(function () {
            $this->routes();

            Nova::resources([
                Category::class,
            ]);
        });
    }

    /**
     * Register the tool's routes.
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-blogify-tool')
            ->group(__DIR__.'/../routes/api.php');
    }
}
