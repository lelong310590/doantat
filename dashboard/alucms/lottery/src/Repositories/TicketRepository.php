<?php
/**
 * TicketRepository.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Repositories;

use AluCMS\Lottery\Models\Ticket;
use Prettus\Repository\Eloquent\BaseRepository;

class TicketRepository extends BaseRepository
{
    public function model()
    {
        // TODO: Implement model() method.
        return Ticket::class;
    }

    public function search($keyword)
    {
        return $this->with('user')->with('ticketDetail')->scopeQuery(function ($e) use ($keyword) {
            return $e->where('username', 'LIKE', '%'.$keyword.'%');
        })->orderBy('created_at', 'desc')->paginate(config('core.paginate'));
    }
}
