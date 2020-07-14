<?php
/**
 * RoleRepository.php
 * Created by: trainheartnet
 * Created at: 7/4/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Role::class;
    }

    public function search($keywords)
    {
        return $this->scopeQuery(function ($e) use ($keywords) {
            return $e->where('name', 'LIKE', '%'.$keywords.'%');
        })->paginate(config('core.paginate'));
    }

    /**
     * @param $data
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function createRoleWithPermission($data)
    {
        $role = $this->create([
            'name' => $data['name'],
            'guard_name' => $data['guard_name']
        ]);
        if (isset($data['listItems'])) {
            $permissions = $data['listItems'];
            $role->syncPermissions($permissions);
        }
    }
}
