<?php
/**
 * HookProvider.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Bank\Providers;

use AluCMS\Bank\Hook\BankHook;
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
        //add_action('alucms-register-menu', [BankHook::class, 'handle'], 9);
    }
}
