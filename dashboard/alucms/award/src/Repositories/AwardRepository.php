<?php
/**
 * AwardRepository.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Award\Repositories;

use AluCMS\Award\Models\Award;
use Prettus\Repository\Eloquent\BaseRepository;

class AwardRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Award::class;
    }
}
