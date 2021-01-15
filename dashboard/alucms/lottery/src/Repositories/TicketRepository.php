<?php
/**
 * TicketRepository.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Repositories;

use AluCMS\Award\Models\Award;
use AluCMS\Lottery\Models\Ticket;
use AluCMS\Lottery\Models\TicketDetail;
use AluCMS\Wallet\Models\Wallet;
use AluCMS\Wallet\Repositories\WalletRepository;
use Carbon\Carbon;
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
        //$now = Carbon::now();
        $date = Carbon::now()->format('Y/m/d');
        $dateStart = Carbon::parse($date.' 00:00:00');
        $dateEnd = Carbon::parse($date.' 18:00:00');

        $ticket = $this->with('ticketDetail')->scopeQuery(function ($q) use ($userId, $dateStart, $dateEnd) {
            return $q->where('user_id', $userId)->whereBetween('created_at', [$dateStart, $dateEnd]);
        })->first();

        if ($ticket == null || Carbon::now()->greaterThan($dateEnd)) {
            return 0;
        }

        return count($ticket->ticketDetail);
    }

    public function boughtTicket($ticketValue, $gameType = 'ga3so')
    {
        DB::transaction(function () use ($ticketValue, $gameType) {
            $basePrice = config('core.price_per_ticket');

            $walletId = Wallet::where('user_id', Auth::id())->first();
            $award = Award::latest()->first();

            $ticket = $this->scopeQuery(function ($q) {
                return $q->where('user_id', Auth::id())->whereDate('created_at', date('Y-m-d'));
            })->first();

            if ($ticket == null) {
                $ticket = $this->create([
                    'user_id' => Auth::id(),
                    'username' => Auth::user()->username,
                    'game_type' => $gameType
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
                DB::transaction(function () use ($walletId, $basePrice, $ticketValue, $award) {
                    $walletId->decrement('amount', $basePrice * count($ticketValue));
                    $award->increment('value', $basePrice * count($ticketValue)); // add price of tickets bought to award
                });
            } else {
                return 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch';
            }
        });

        return 'Bạn đã mua vé thành công, chúc bạn may mắn ! Cập nhật kết quả sau 18h30 ';
    }
}
