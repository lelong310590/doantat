<?php
/**
 * Lottery.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $table = 'lottery_results';

    protected $fillable = ['result_value', 'result_date' ,'created_at', 'deleted_at'];
}
