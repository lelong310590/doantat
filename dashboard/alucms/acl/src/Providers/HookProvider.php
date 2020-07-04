<?php
/**
 * HookProvider.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Providers;

use AluCMS\Acl\Hook\AclHook;
use Illuminate\Support\ServiceProvider;

class HookProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            $this->booted();
        });
    }

    public function register()
    {

    }

    private function booted()
    {
        add_action('alucms-register-menu', [AclHook::class, 'handle'], 1);
    }
}