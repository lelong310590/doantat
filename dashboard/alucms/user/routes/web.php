<?php
/**
 * web.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('core.admin_route');
$moduleRoute = 'users';

Route::group(['prefix' => $adminRoute.'/'.$moduleRoute], function (Router $router) use ($moduleRoute) {
    $router->group(['prefix' => $moduleRoute], function (Router $router) {
        $router->get('index', 'UserController@getIndex')
            ->name('alucms::user.index.get')
            ->middleware('permission:user_index');
        $router->get('create', 'UserController@getCreate')
            ->name('alucms::user.create.get')
            ->middleware('permission:user_create');
        $router->post('create', 'UserController@postCreate')
            ->name('alucms::user.create.post')
            ->middleware('permission:user_create');
        $router->get('edit/{id}', 'UserController@getEdit')
            ->name('alucms::user.edit.get')
            ->middleware('permission:user_edit');
        $router->post('edit/{id}', 'UserController@postEdit')
            ->name('alucms::user.edit.post')
            ->middleware('permission:user_edit');
        $router->get('delete/{id}', 'UserController@getDelete')
            ->name('alucms::user.delete.get')
            ->middleware('permission:user_delete');
    });
});
