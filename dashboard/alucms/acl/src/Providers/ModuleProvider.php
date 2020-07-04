<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class ModuleProvider
 * @package AluCMS\Acl\Providers
 */

namespace AluCMS\Acl\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'acl');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'acl');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/permission.php', 'acl');

        $this->app->register(MiddlewareProvider::class);
        $this->app->register(RouteProvider::class);
        $this->app->register(HookProvider::class);
    }
}
