<?php
/**
 * web.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('core.admin_route');
$moduleRoute = 'wallets';

Route::group(['prefix' => $adminRoute], function (Router $router) use ($moduleRoute) {
    $router->group(['prefix' => $moduleRoute], function (Router $router) {
        $router->get('index', 'WalletController@getIndex')
            ->name('alucms::wallet.index.get')
            ->middleware('permission:wallet_index');
        $router->get('create', 'WalletController@getCreate')
            ->name('alucms::wallet.create.get')
            ->middleware('permission:wallet_create');
        $router->post('create', 'WalletController@postCreate')
            ->name('alucms::wallet.create.post')
            ->middleware('permission:wallet_create');
        $router->get('edit/{id}', 'WalletController@getEdit')
            ->name('alucms::wallet.edit.get')
            ->middleware('permission:wallet_edit');
        $router->post('edit/{id}', 'WalletController@postEdit')
            ->name('alucms::wallet.edit.post')
            ->middleware('permission:wallet_edit');
    });
});
