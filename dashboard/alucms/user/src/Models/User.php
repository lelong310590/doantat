<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class User
 * @package AluCMS\User\Models
 */

namespace AluCMS\User\Models;

use AluCMS\Lottery\Models\Ticket;
use AluCMS\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username', 'email', 'password', 'pay_password', 'thumbnail', 'full_name', 'phone', 'address', 'identify_card', 'status',
        'created_at', 'updated_at', 'created_by', 'edited_by', 'description', 'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token', 'pay_password'
    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setPayPasswordAttribute($value)
    {
        $this->attributes['pay_password'] = bcrypt($value);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class, 'user_id', 'id');
    }

}
