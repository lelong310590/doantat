<?php
/**
 * web.php
 * Created by: trainheartnet
 * Created at: 7/24/20
 * Contact me at: longlengoc90@gmail.com
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::group(['prefix' => ''], function (Router $router) {
    $router->get('/', 'ThemeController@getHome')
            ->name('theme::home.get');
    $router->post('login', 'ThemeAuthController@postLogin')
            ->name('theme::login.post');
    $router->post('register', 'ThemeAuthController@postRegister')
            ->name('theme::register.post');
    $router->get('logout', 'ThemeAuthController@getLogout')
            ->name('theme::logout.get');
});


Route::group(['prefix' => 'user'], function (Router $router) {
    $router->get('buy-ticket', 'ThemeBuyTicketController@getIndex')
        ->name('theme.buyticket.get')
        ->middleware('auth');
    $router->post('buy-ticket', 'ThemeBuyTicketController@postIndex')
        ->name('theme.buyticket.post')
        ->middleware('auth');

    $router->get('info', 'ThemeUserController@getIndex')
        ->name('theme.user.get')
        ->middleware('auth');
    $router->post('info', 'ThemeUserController@postIndex')
        ->name('theme.user.post')
        ->middleware('auth');

    $router->get('pay', 'ThemePayController@getPay')
        ->name('theme.pay.get')
        ->middleware('auth');
    $router->post('pay', 'ThemePayController@postPay')
        ->name('theme.pay.post')
        ->middleware('auth');

    $router->get('history', 'ThemeHistoryController@getIndex')
        ->name('theme.history.get')
        ->middleware('auth');
});
