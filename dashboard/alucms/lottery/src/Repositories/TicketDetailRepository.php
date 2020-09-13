<?php
/**
 * TicketDetailRepository.php
 * Created by: trainheartnet
 * Created at: 9/13/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Repositories;

use AluCMS\Lottery\Models\TicketDetail;
use Prettus\Repository\Eloquent\BaseRepository;

class TicketDetailRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return TicketDetail::class;
    }
}
