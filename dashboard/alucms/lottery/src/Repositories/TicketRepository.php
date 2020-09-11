<?php
/**
 * TicketRepository.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Repositories;

use AluCMS\Lottery\Models\Ticket;
use Carbon\Carbon;
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


    public function countAvaiableTicket($userId)
    {
        $ticket = $this->with('ticketDetail')->scopeQuery(function ($q) use ($userId) {
            return $q->where('user_id', $userId)->whereDate('created_at', Carbon::now()->format('Y-m-d'));
        })->first();

        if ($ticket == null) {
            return 0;
        }

        return count($ticket->ticketDetail);
    }
}
