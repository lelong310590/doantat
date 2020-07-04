<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class Auth
 * @package AluCMS\Auth\Supports
 */

namespace AluCMS\Auth\Supports;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

trait Auth
{
    use AuthenticatesUsers;

    protected $maxLoginAttempts = 5;

    protected $lockoutTime = 60;

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function login( Request $request )
    {
        $lockedOut = $this->hasTooManyLoginAttempts($request);

        if ($lockedOut) {
            $this->fireLockoutEvent($request);
        }

        $credentials = $this->credentials($request);
        $credentials['status'] = 'active';

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {

            return $this->sendLoginResponse($request);
        }

        if (!$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => trans('auth::auth.loggin_error'),
        ]);
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => trans('auth::auth.loggin_looked') . $seconds,
        ])->status(423);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated( Request $request, $user )
    {
        return redirect()->to($this->redirectTo);
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
