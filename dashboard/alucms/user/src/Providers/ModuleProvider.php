<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class ModuleProvider
 * @package AluCMS\User\Provider
 */

namespace AluCMS\User\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'user');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'user');
    }

    public function register()
    {
        $this->app->register(RouteProvider::class);
        $this->app->register(HookProvider::class);
    }
}
