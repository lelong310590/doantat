<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class RedirectIfAuthenticated
 * @package AluCMS\Auth\Http\Middleware
 */

namespace AluCMS\Auth\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->to(route('alucms::dashboard.index.get'));
        }

        return $next($request);
    }
}
