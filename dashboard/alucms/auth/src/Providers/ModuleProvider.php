<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class ModuleProvider
 * @package AluCMS\Auth\Providers
 */

namespace AluCMS\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use AluCMS\User\Models\User;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'auth');

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'auth');
    }

    public function register()
    {
        config([
            'auth.defaults' => [
                'guard' => 'core',
                'passwords' => 'admin-users',
            ],
            'auth.guards.core' => [
                'driver' => 'session',
                'provider' => 'admin-users',
            ],
            'auth.providers.admin-users' => [
                'driver' => 'eloquent',
                'model' => User::class,
                'table' => 'users'
            ],
            'auth.passwords.admin-users' => [
                'provider' => 'admin-users',
                'table' => 'password_resets',
                'expire' => 60,
            ],
        ]);

        $this->app->register(RouteProvider::class);
        $this->app->register(MiddlewareProvider::class);
    }
}
