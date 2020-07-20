<?php
/**
 * LotteryRepository.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Repositories;

use AluCMS\Lottery\Models\Lottery;
use Prettus\Repository\Eloquent\BaseRepository;

class LotteryRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Lottery::class;
    }
}
