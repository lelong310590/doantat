<?php
/**
 * PermissionController.php
 * Created by: trainheartnet
 * Created at: 7/14/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Http\Controllers;

use AluCMS\Acl\Repositories\PermissionRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionController extends BaseController
{
    protected $permission;

    public function __construct(Request $request, LaravelDebugbar $debugbar, PermissionRepository $permissionRepository)
    {
        parent::__construct($request, $debugbar);
        $this->permission = $permissionRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getIndex() : View
    {
        $permission = $this->permission->paginate(config('core.paginate'));

        return view('acl::permission.index', [
            'permission' => $permission
        ]);
    }
}
