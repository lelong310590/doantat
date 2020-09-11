<?php
/**
 * HookProvider.php
 * Created by: trainheartnet
 * Created at: 8/30/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Notification\Providers;

use AluCMS\Notification\Hook\NotificationHook;
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
        add_action('alucms-register-menu', [NotificationHook::class, 'handle'], 6);
    }
}
