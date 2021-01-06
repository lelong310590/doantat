<?php
/**
 * LodeController.php
 * Created by: trainheartnet
 * Created at: 11/29/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;

class LodeController extends BaseController
{
    public function getIndex()
    {
        return view('theme::lode.index');
    }
}
