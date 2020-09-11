<?php
/**
 * Notification.php
 * Created by: trainheartnet
 * Created at: 8/29/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Notification\Models;

use AluCMS\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';

    protected $fillable = ['content', 'type', 'status', 'user_id', 'amount', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function user()
    {
        $relation = $this->belongsTo(User::class, 'user_id', 'id');
        return $relation->select('username', 'id', 'email', 'thumbnail');
    }
}
