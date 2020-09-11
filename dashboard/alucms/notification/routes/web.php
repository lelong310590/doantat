<?php
/**
 * web.php
 * Created by: trainheartnet
 * Created at: 8/28/20
 * Contact me at: longlengoc90@gmail.com
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('core.admin_route');
$moduleRoute = 'notification';

Route::group(['prefix' => $adminRoute], function (Router $router) use ($moduleRoute) {
    $router->group(['prefix' => $moduleRoute], function (Router $router) {
        $router->get('index', 'NotificationController@getIndex')
            ->name('alucms::notification.index.get')
            ->middleware('permission:notification_index');

        $router->get('edit/{id}', 'NotificationController@getEdit')
            ->name('alucms::notification.edit.get')
            ->middleware('permission:notification_edit');

        $router->post('edit/{id}', 'NotificationController@postEdit')
            ->name('alucms::notification.edit.post')
            ->middleware('permission:notification_edit');
    });
});
