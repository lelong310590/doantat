<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class User
 * @package AluCMS\User\Models
 */

namespace AluCMS\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use SoftDeletes;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username', 'email', 'password', 'thumbnail', 'full_name', 'phone', 'address', 'identify_card', 'status',
        'created_at', 'updated_at', 'created_by', 'edited_by', 'description', 'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
