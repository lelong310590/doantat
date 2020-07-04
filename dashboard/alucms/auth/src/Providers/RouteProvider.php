<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class RouteProvider
 * @package AluCMS\Auth\Providers
 */

namespace AluCMS\Auth\Providers;

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

class RouteProvider extends RouteServiceProvider
{
    protected $namespace = 'AluCMS\Auth\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function() {
            require __DIR__.'/../../routes/web.php';
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api'
        ], function() {
            require __DIR__.'/../../routes/api.php';
        });
    }
}
