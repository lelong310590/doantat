<?php
/**
 * Billboard.php
 * Created by: trainheartnet
 * Created at: 9/18/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Billboard\Models;

use AluCMS\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Billboard extends Model
{
    protected $table = 'billboard';

    protected $fillable = [
        'user_id', 'game', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
