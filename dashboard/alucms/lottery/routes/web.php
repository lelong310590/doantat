<?php
/**
 * web.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('core.admin_route');
$moduleRoute = 'lottery';

Route::group(['prefix' => $adminRoute], function (Router $router) use ($moduleRoute) {
    $router->group(['prefix' => $moduleRoute], function (Router $router) {
        $router->get('index', 'LotteryController@getIndex')
            ->name('alucms::lottery.index.get')
            ->middleware('permission:lottery_index');
    });
});
