<?php
/**
 * ThemeAuth.php
 * Created by: trainheartnet
 * Created at: 7/25/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Auth\Http\Request\AuthRequest;
use AluCMS\Auth\Supports\Auth;
use AluCMS\User\Http\Requests\UserCreateRequest;
use AluCMS\User\Repositories\UserRepository;
use AluCMS\Wallet\Repositories\WalletRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class ThemeAuthController extends BaseController
{
    use Auth;

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout']]);
        $this->redirectTo = route('theme::home.get');
        $this->redirectPath = route('alucms::dashboard.index.get');
        $this->redirectToLoginPage = route('theme::home.get');
    }

    private function authenticated(Request $request, Authenticatable $user)
    {
        return redirect()->intended($this->redirectTo);
    }

    public function postRegister(UserCreateRequest $request, UserRepository $userRepository, WalletRepository $walletRepository)
    {
        $newUser = $userRepository->create($request->all() + ['status' => 'active']);
        $newUser->syncRoles('player');
        $walletRepository->create([
            'user_id' => $newUser->id,
            'user_name' => $newUser->username,
            'status' => 'active'
        ]);
        auth()->loginUsingId($newUser->id);
        return redirect()->route('theme::home.get');
    }


    public function postLogin(AuthRequest $request)
    {
        return $this->login(request());
    }

    public function getLogout()
    {
        $this->guard()->logout();

        session()->flush();

        session()->regenerate();

        return redirect()->to($this->redirectToLoginPage)->with([
            'message' => 'Bạn đã đăng xuất khỏi hệ thống'
        ]);;
    }
}
