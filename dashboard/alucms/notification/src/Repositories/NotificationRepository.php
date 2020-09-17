<?php
/**
 * NotificationRepository.php
 * Created by: trainheartnet
 * Created at: 8/29/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Notification\Repositories;

use AluCMS\Notification\Models\Notification;
use Prettus\Repository\Eloquent\BaseRepository;

class NotificationRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Notification::class;
    }

    public function search($keyword, $type)
    {
        return $this->scopeQuery(function ($e) use ($keyword, $type) {
            return $e->whereHas('user', function ($q) use ($keyword) {
                return $q->where('username', 'LIKE', '%'.$keyword.'%');
            })->where('type', $type);
        })->paginate(config('core.paginate'));
    }
}
