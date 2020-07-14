<?php
/**
 * RoleController.php
 * Created by: trainheartnet
 * Created at: 7/3/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Http\Controllers;

use AluCMS\Acl\Http\Requests\RoleCreateRequest;
use AluCMS\Acl\Http\Requests\RoleEditRequest;
use AluCMS\Acl\Repositories\PermissionRepository;
use AluCMS\Acl\Repositories\RoleRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use AluCMS\Core\Supports\FlashMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends BaseController
{
    protected $role;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->role = $roleRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getIndex(Request $request) : View
    {
        $keywords = $request->get('keywords');
        $role = $this->role->paginate(config('core.paginate'));
        if ($keywords) {
            $role = $this->role->search($keywords);
        }

        return view('acl::role.index', [
            'role' => $role
        ]);
    }

    /**
     * @param PermissionRepository $permissionRepository
     * @return View
     */
    public function getCreate(PermissionRepository $permissionRepository) : View
    {
        return view('acl::role.create', [
            'permissions' => $permissionRepository->all()
        ]);
    }

    /**
     * @param RoleCreateRequest $request
     * @return RedirectResponse
     */
    public function postCreate(RoleCreateRequest $request) : RedirectResponse
    {
        $this->role->createRoleWithPermission($request->all());
        return redirect()->back()->with(FlashMessages::returnMessage('create'));
    }

    /**
     * @param $id
     * @param PermissionRepository $permissionRepository
     * @return View
     */
    public function getEdit($id, PermissionRepository $permissionRepository) : View
    {
        $role = $this->role->with('permissions')->find($id);
        $currentPermision = $role->permissions()->get()->toArray();
        $args = [];
        foreach ($currentPermision as $perm) {
            $args[] = $perm['id'];
        }

        return view('acl::role.edit', [
            'permissions' => $permissionRepository->all(),
            'role' => $role,
            'currentPermision' => $args
        ]);
    }

    /**
     * @param $id
     * @param RoleEditRequest $request
     * @return RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postEdit($id, RoleEditRequest $request) : RedirectResponse
    {
        $input = $request->only(['name', 'guard_ name']);
        $role = $this->role->update($input, $id);
        $role->syncPermissions($request->get('listItems'));
        return redirect()->back()->with(FlashMessages::returnMessage('edit'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id) : RedirectResponse
    {
        $role = $this->role->find($id);
        $accountUseThisRole = $role->users()->get();

        if (count($accountUseThisRole) == 0) {
            $this->role->delete($id);
            return redirect()->back()->with(FlashMessages::returnMessage('delete'));
        }

        return redirect()->back()->withErrors(trans('dashboard::error.error.delete_role_has_user'));
    }
}
