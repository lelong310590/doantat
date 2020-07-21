<?php
/**
 * Award.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Award\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'awards';

    protected $fillable = [
        'value', 'created_at', 'updated_at', 'status'
    ];
}
