<?php
/**
 * ThemeWithdrawalController.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;

class ThemeWithdrawalController extends BaseController
{
    public function getIndex()
    {
        return view('theme::layouts.withdrawal');
    }

    public function postIndex()
    {

    }
}
