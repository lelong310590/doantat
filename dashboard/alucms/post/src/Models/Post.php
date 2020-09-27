<?php
/**
 * Post.php
 * Created by: trainheartnet
 * Created at: 9/19/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Post\Models;

use AluCMS\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title', 'slug', 'content', 'type', 'status', 'user_id', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
