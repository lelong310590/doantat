<?php
/**
 * UserRepository.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\User\Repositories;

use AluCMS\User\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return User::class;
    }

    public function search($keywords)
    {
        return $this->scopeQuery(function ($e) use ($keywords) {
            return $e->with('roles')->where('username', 'LIKE', '%'.$keywords.'%');
        })->paginate(config('core.paginate'));
    }
}
