<?php
/**
 * TicketRepository.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Repositories;

use AluCMS\Lottery\Models\Ticket;
use AluCMS\Lottery\Models\TicketDetail;
use AluCMS\Wallet\Models\Wallet;
use AluCMS\Wallet\Repositories\WalletRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            return $q->where('user_id', $userId)->whereDate('created_at', date('Y-m-d'));
        })->first();

        if ($ticket == null) {
            return 0;
        }

        return count($ticket->ticketDetail);
    }

    public function boughtTicket($ticketValue)
    {
        DB::transaction(function () use ($ticketValue) {
            $basePrice = config('core.price_per_ticket');

            $wallet = new Wallet();
            $walletId = $wallet->where('user_id', Auth::id())->first();

            $ticket = $this->scopeQuery(function ($q) {
                return $q->where('user_id', Auth::id())->whereDate('created_at', date('Y-m-d'));
            })->first();

            if ($ticket == null) {
                $ticket = $this->create([
                    'user_id' => Auth::id(),
                    'username' => Auth::user()->username
                ]);
            }

            foreach ($ticketValue as $t) {
                $ticketDetail = new TicketDetail();
                $ticketDetail->ticket_id = $ticket->id;
                $ticketDetail->value = $t;
                $ticketDetail->save();
            }

            //dd($basePrice * count($ticketValue));
            if ($walletId->amount >= $basePrice * count($ticketValue)) {
                $walletId->decrement('amount', $basePrice * count($ticketValue));
            } else {
                return 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch';
            }
        });

        return 'Bạn đã mua vé thành công, chúc bạn may mắn ! Cập nhật kết quả sau 18h30 ';
    }
}
