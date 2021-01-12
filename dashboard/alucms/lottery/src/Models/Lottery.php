<?php
/**
 * Lottery.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $table = 'lottery_results';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }
}
