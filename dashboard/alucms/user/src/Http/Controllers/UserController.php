<?php
/**
 * UserController.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\User\Http\Controllers;

use AluCMS\Acl\Repositories\RoleRepository;
use AluCMS\Core\Supports\FlashMessages;
use AluCMS\User\Http\Requests\UserCreateRequest;
use AluCMS\User\Http\Requests\UserEditRequest;
use AluCMS\User\Models\User;
use AluCMS\User\Repositories\UserRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends BaseController
{
    protected $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getIndex(Request $request) : View
    {
        $keywords = $request->get('keywords');
        $user = $this->user->with('roles')->paginate(config('core.paginate'));
        if ($keywords) {
            $user = $this->user->search($keywords);
        }

        return view('user::index', [
            'user' => $user
        ]);
    }

    /**
     * @param RoleRepository $roleRepository
     * @return View
     */
    public function getCreate(RoleRepository $roleRepository) : View
    {
        return view('user::create', [
            'role' => $roleRepository->all(['id', 'name'])
        ]);
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postCreate(UserCreateRequest $request) : RedirectResponse
    {
        $user = $this->user->create($request->all());
        $user->syncRoles($request->get('role'));
        return redirect()->back()->with(FlashMessages::returnMessage('create'));
    }

    /**
     * @param $id
     * @param RoleRepository $roleRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function getEdit($id, RoleRepository $roleRepository) : View
    {
        return view('user::edit', [
            'user' => $this->user->with(['roles' => function($q) {
                $q->select('id')->first();
            }])->find($id),
            'role' => $roleRepository->all(['id', 'name'])
        ]);
    }

    /**
     * @param $id
     * @param UserEditRequest $request
     * @return RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postEdit($id, usereditrequest $request) : RedirectResponse
    {
        $data = $request->except(['_token', 'email']);

        if ($request->get('password') == null) {
            $data = $request->except(['_token', 'email', 'password', 'repassword']);
        }

        $user = $this->user->update($data, $id);
        $user->syncRoles($request->get('role'));
        return redirect()->back()->with(FlashMessages::returnMessage('edit'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function getDelete($id) : RedirectResponse
    {
        $current = auth()->user()->id;
        if ($current == $id) {
            return redirect()->back()->withErrors(trans('dashboard::error.error.delete_current_user'));
        }

        $this->user->delete($id);
        return redirect()->back()->with(FlashMessages::returnMessage('delete'));
    }
}
