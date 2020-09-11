<?php
/**
 * Wallet.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Wallet\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use AluCMS\User\Models\User;

class Wallet extends Model
{
    protected $table = 'wallets';

    protected $fillable = [
        'user_id', 'amount', 'status', 'created_at', 'updated_at'
    ];

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
        return $relation->select('id', 'username', 'email', 'thumbnail');
    }
}
