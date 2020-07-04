<?php
/**
 * web.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('core.admin_route');
$moduleRoute = 'acl';

Route::group(['prefix' => $adminRoute.'/'.$moduleRoute], function (Router $router) {
    $router->group(['prefix' => 'role'], function (Router $router) {
        $router->get('index', 'RoleController@getIndex')
            ->name('alucms::role.index.get')
            ->middleware('permission:role_index');
        $router->get('create', 'RoleController@getCreate')
            ->name('alucms::role.create.get')
            ->middleware('permission:role_create');
        $router->post('create', 'RoleController@postCreate')
            ->name('alucms::role.create.post')
            ->middleware('permission:role_create');
        $router->get('edit/{id}', 'RoleController@getEdit')
            ->name('alucms::role.edit.get')
            ->middleware('permission:role_edit');
        $router->post('edit/{id}', 'RoleController@postEdit')
            ->name('alucms::role.edit.post')
            ->middleware('permission:role_edit');
        $router->get('delete/{id}', 'RoleController@getDelete')
            ->name('alucms::role.delete.get')
            ->middleware('permission:role_delete');
    });

    $router->group(['prefix' => 'permission'], function(Router $router) {
        $router->get('index', 'PermissionController@getIndex')
            ->name('alucms::permission.index.get')
            ->middleware('permission:permission_index');
    });
});
