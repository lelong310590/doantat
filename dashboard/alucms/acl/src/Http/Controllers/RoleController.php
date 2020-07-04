<?php
/**
 * RoleController.php
 * Created by: trainheartnet
 * Created at: 7/3/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\View\View;

class RoleController extends BaseController
{

    public function getIndex() : View
    {
        return view('acl::role.index');
    }

    public function getCreate() : View
    {
        return view('acl::role.create');
    }

    public function postCreate()
    {

    }

    public function getEdit()
    {

    }

    public function postEdit()
    {

    }

    public function getDelete()
    {

    }
}
