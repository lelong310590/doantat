<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('core.admin_route');
$moduleRoute = 'auth';

Route::group(['prefix' => $adminRoute], function (Router $router) use ($adminRoute, $moduleRoute) {
    $router->get('/', function () use ($adminRoute) {
        return redirect()->route('alucms::auth.login.get');
    });

    $router->group(['prefix' => $moduleRoute], function (Router $router) use ($adminRoute) {
        $router->get('login', 'AuthController@getLogin')->name('alucms::auth.login.get');
        $router->post('login', 'AuthController@postLogin')->name('alucms::auth.login.post');
        $router->get('logout', 'AuthController@getLogout')->name('alucms::auth.logut.get');
    });
});
