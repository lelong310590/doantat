<?php
/**
 * Award.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Award\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Award extends Model
{
    protected $table = 'awards';

    protected $fillable = [
        'value', 'created_at', 'updated_at', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

}
