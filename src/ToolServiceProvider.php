<?php

namespace Mattmangoni\NovaBlogifyTool;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mattmangoni\NovaBlogifyTool\Models\Image;
use Mattmangoni\NovaBlogifyTool\Bootstrap\Blogify;
use Mattmangoni\NovaBlogifyTool\Observers\ImageObserver;
use Mattmangoni\NovaBlogifyTool\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-blogify-tool');

        $this->app->booted(function () {
            $this->routes();

            Blogify::injectToolResources();
        });

        //Image::observe(ImageObserver::class);
    }

    /**
     * Register the tool's routes.
     *
     * @return void
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

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
