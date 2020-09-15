<?php
/**
 * ModuleProvider.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Bank\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        //$this->loadViewsFrom(__DIR__.'/../../resources/views', 'bank');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        //$this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'bank');
    }

    public function register()
    {
        //$this->app->register(RouteProvider::class);
        //$this->app->register(HookProvider::class);
    }
}
