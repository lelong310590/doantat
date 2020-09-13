<?php
/**
 * ThemeHistoryController.php
 * Created by: trainheartnet
 * Created at: 9/13/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Lottery\Repositories\LotteryRepository;
use Illuminate\Support\Facades\Auth;
use AluCMS\Lottery\Repositories\TicketRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThemeHistoryController extends BaseController
{
    public function getIndex(Request $request, TicketRepository $ticketRepository, LotteryRepository  $lotteryRepository)
    {
        $date = $request->get('date');
        $time = Carbon::now()->format('Y/m/d');
        if ($date != null) {
            $time = Carbon::createFromFormat('d/m/Y', $date);
        }

        $bingo = $lotteryRepository->scopeQuery(function ($q) use ($time) {
            return $q->whereDate('created_at', $time);
        })->first();

        $ticket = $ticketRepository->with('ticketDetail')->scopeQuery(function ($q) use ($time) {
            return $q->where('user_id', Auth::id())->whereDate('created_at', $time);
        })->first();

        return view('theme::layouts.history', [
            'ticket' => $ticket,
            'bingo' => $bingo
        ]);
    }
}
