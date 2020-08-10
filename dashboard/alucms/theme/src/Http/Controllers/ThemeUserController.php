<?php
/**
 * ThemeUserController.php
 * Created by: trainheartnet
 * Created at: 7/27/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Theme\Http\Controllers;

use AluCMS\User\Repositories\UserRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;

class ThemeUserController extends BaseController
{
    protected $user;

    public function __construct(Request $request, LaravelDebugbar $debugbar, UserRepository $userRepository)
    {
        parent::__construct($request, $debugbar);
        $this->user = $userRepository;
    }

    public function getIndex()
    {
        return view('theme::layouts.user_index');
    }
}
