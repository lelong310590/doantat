<?php
/**
 * HookProvider.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\User\Providers;

use AluCMS\User\Hook\UserHook;
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
        add_action('alucms-register-menu', [UserHook::class, 'handle'], 2);
    }
}
