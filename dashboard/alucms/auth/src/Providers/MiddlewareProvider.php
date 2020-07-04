<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class MiddlewareProvider
 * @package AluCMS\Auth\Providers
 */

namespace AluCMS\Auth\Providers;

use AluCMS\Auth\Http\Middleware\Authenticated;
use AluCMS\Auth\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\ServiceProvider;
use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Middleware\EntrustAbility;

class MiddlewareProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app['router']->aliasMiddleware('core', Authenticated::class);
        $this->app['router']->pushMiddlewareToGroup('web', Authenticated::class);
        $this->app['router']->pushMiddlewareToGroup('guest', RedirectIfAuthenticated::class);
        $this->app['router']->aliasMiddleware('role', EntrustRole::class);
        $this->app['router']->aliasMiddleware('permission', EntrustPermission::class);
        $this->app['router']->aliasMiddleware('ability', EntrustAbility::class);
    }
}
