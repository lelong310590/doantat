<?php
/**
 * Bank.php
 * Created by: trainheartnet
 * Created at: 9/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Bank\Models;

use AluCMS\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'user_id', 'bank_name', 'bank_branch', 'bank_number', 'bank_holder', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
