<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class Authenticated
 * @package AluCMS\Auth\Http\Middleware
 */

namespace AluCMS\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticated
{
    const LOGIN_ROUTE_NAME_GET = 'alucms::auth.login.get';

    const LOGIN_ROUTE_NAME_POST = 'alucms::auth.login.post';

    const DASHBOARD_ROUTE_NAME_GET = 'alucms::dashboard.index.get';

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $currentRouteName = $request->route()->getName();
        if ($currentRouteName == $this::LOGIN_ROUTE_NAME_GET || $currentRouteName == $this::LOGIN_ROUTE_NAME_POST
        ) {
            return $next($request);
        }

        if (is_in_dashboard()) {
            if (auth('core')->guest()) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Unauthorized.', \Constants::UNAUTHORIZED_CODE);
                }
                return redirect()->guest(route($this::LOGIN_ROUTE_NAME_GET));
            }
        } else {
//            if (!auth()->check()) {
//                return redirect()->route('theme::home.get');
//            }
        }

//		if (auth('lito')->check()) {
//			$checkPerms = auth()->user()->can('access_dashboard');
//			return redirect()->guest(routes('lito::dashboard.index.get'));
//		}


        return $next($request);
    }
}
