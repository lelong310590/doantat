<?php
/**
 * ThemeUserController.php
 * Created by: trainheartnet
 * Created at: 7/27/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Core\Supports\FlashMessages;
use AluCMS\Theme\Http\Requests\EditUserRequest;
use AluCMS\User\Repositories\UserRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ThemeUserController extends BaseController
{
    protected $user;

    public function __construct(Request $request, LaravelDebugbar $debugbar, UserRepository $userRepository)
    {
        parent::__construct($request, $debugbar);
        $this->user = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex() : View
    {
        return view('theme::layouts.user_index');
    }


    public function postIndex(EditUserRequest $request)
    {
        $password = $request->get('password');
        $newPassword = $request->get('new_password');
        $payPassword = $request->get('pay_password');
        $newPayPassword = $request->get('new_paypassword');
        $user = Auth::user();
        $data = $request->except(['_token', 'email', 'username', 'password', 'pay_password']);

        if ($password != '' && $newPassword != '') {
            $oldPassword = $user->getAuthPassword();
            if (!Hash::check($password, $oldPassword)) {
                return redirect()->back()->withErrors('Mật khẩu cũ không chính xác');
            }

            $data['password'] = $newPassword;
        }

        if ($payPassword != '' || $newPayPassword != '') {
            if ($user->pay_password == null) {
                $data['pay_password'] = $payPassword;
            } else {
                if (!Hash::check($payPassword, $user->pay_password)) {
                    return redirect()->back()->withErrors('Mật khẩu thanh toán cũ không chính xác');
                }

                $data['pay_password'] = $newPayPassword;
            }
        }

        $this->user->update($data, auth()->id());
        return redirect()->back()->with(FlashMessages::returnMessage('edit'));
    }
}
