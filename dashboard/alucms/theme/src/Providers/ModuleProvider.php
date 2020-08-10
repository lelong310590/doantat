<?php
/**
 * ModuleProvider.php
 * Created by: trainheartnet
 * Created at: 7/21/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Theme\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'theme');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'theme');
    }

    public function register()
    {
        $this->app->register(RouteProvider::class);
    }
}
