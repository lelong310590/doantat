<?php
/**
 * RouteProvider.php
 * Created by: trainheartnet
 * Created at: 7/21/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Providers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteProvider extends RouteServiceProvider
{
    protected $namespace = 'AluCMS\Theme\Http\Controllers';

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
