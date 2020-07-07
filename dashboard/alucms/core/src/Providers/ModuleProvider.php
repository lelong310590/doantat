<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class ModuleProvider
 * @package AluCMS\Core\Providers
 */

namespace AluCMS\Core\Providers;

use AluCMS\Core\Supports\Helper;
use AluCMS\Core\View\Components\Button;
use AluCMS\Core\View\Components\Input;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'dashboard');
        $this->loadViewComponentsAs('alucms-form', [
            Input::class,
            Button::class
        ]);
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register()
    {
        //Load helpers
        Helper::loadModuleHelpers(__DIR__);

        /**
         * Config
         */
        $this->mergeConfigFrom(__DIR__ . '/../../config/core.php', 'core');

        /**
         * Seft providers
         */
        $this->app->register(RouteProvider::class);

        /**
         * Other module providers
         */
        $this->app->register(\AluCMS\Hook\Providers\ModuleProvider::class);
        $this->app->register(\AluCMS\Auth\Providers\ModuleProvider::class);
        $this->app->register(\AluCMS\User\Providers\ModuleProvider::class);
        $this->app->register(\AluCMS\Acl\Providers\ModuleProvider::class);
    }
}
