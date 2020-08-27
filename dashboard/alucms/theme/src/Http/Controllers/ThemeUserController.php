<?php
/**
 * ThemeUserController.php
 * Created by: trainheartnet
 * Created at: 7/27/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Core\Supports\FlashMessages;
use AluCMS\User\Repositories\UserRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
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

    public function postIndex(Request $request)
    {
        $data = $request->except(['_token', 'email', 'username']);
        $this->user->update($data, auth()->id());
        return redirect()->back()->with(FlashMessages::returnMessage('edit'));
    }
}
