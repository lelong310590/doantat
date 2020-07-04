<?php
/**
 * PermissionRepository.php
 * Created by: trainheartnet
 * Created at: 7/4/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Permission::class;
    }
}
