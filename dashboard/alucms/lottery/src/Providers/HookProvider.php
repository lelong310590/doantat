<?php
/**
 * LotteryHook.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Providers;

use AluCMS\Lottery\Hook\LotteryHook;
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
        add_action('alucms-register-menu', [LotteryHook::class, 'handle'], 5);
    }
}
