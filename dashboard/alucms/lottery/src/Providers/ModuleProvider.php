<?php
/**
 * ModuleProvider.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Providers;

use AluCMS\Lottery\Console\Commands\LotteryGetResult;
use AluCMS\Lottery\Console\Commands\CheckAward;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'lottery');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'lottery');

        if ($this->app->runningInConsole()) {
            $this->commands([
                LotteryGetResult::class,
                CheckAward::class
            ]);
        }

        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);

            $schedule->command('get_lottery_result')
                    ->weekdays()
                    ->everyMinute()
                    ->timezone(config('app.timezone'))
                    ->between('18:15', '18:20');

            $schedule->command('check_award')
                ->dailyAt('18:30')
                ->timezone(config('app.timezone'));
        });
    }

    public function register()
    {
        $this->app->register(RouteProvider::class);
        $this->app->register(HookProvider::class);
    }
}
