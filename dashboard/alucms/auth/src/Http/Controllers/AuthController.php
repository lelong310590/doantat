<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class AuthController
 * @package AluCMS\Auth\Http\Controllers
 */

namespace AluCMS\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use AluCMS\Auth\Supports\Auth;
use AluCMS\Auth\Http\Request\AuthRequest;

class AuthController extends Controller
{
    use Auth;

    protected $reset;
    protected $mail;
    protected $user;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout']]);
        $this->redirectTo = route('alucms::dashboard.index.get');
        $this->redirectPath = route('alucms::dashboard.index.get');
        $this->redirectToLoginPage = route('alucms::auth.login.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('auth::login');
    }

    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function postLogin(AuthRequest $request)
    {
        return $this->login(request());
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        $this->guard()->logout();

        session()->flush();

        session()->regenerate();

        return redirect()->to($this->redirectToLoginPage);
    }

    /**
     * @param Request $request
     * @param Authenticatable $user
     * @return \Illuminate\Http\RedirectResponse
     */
    private function authenticated(Request $request, Authenticatable $user)
    {
        return redirect()->intended($this->redirectTo);
    }
}
