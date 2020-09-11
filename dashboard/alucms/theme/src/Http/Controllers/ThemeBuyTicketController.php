<?php
/**
 * ThemeBuyTicketController.php
 * Created by: trainheartnet
 * Created at: 9/12/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Award\Models\Award;
use AluCMS\Lottery\Models\TicketDetail;
use AluCMS\Lottery\Repositories\TicketRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeBuyTicketController extends BaseController
{

    public function getIndex(TicketRepository $ticketRepository)
    {
        $userId = Auth::id();
        $currentAward = Award::where('status', 'active')->first(['value', 'created_at']);
        $ticketFromStartToNow = TicketDetail::whereBetween('created_at', [$currentAward->created_at, Carbon::now()])->count();
        $valueFromStartToNow = $ticketFromStartToNow * config('core.price_per_ticket');

        $boughtTicket = $ticketRepository->countAvaiableTicket($userId);
        $maxTicket = config('core.limit_ticket');

        return view('theme::layouts.buyticket_index', [
            'currentAward' => $currentAward->value,
            'valueFromStartToNow' => $valueFromStartToNow,
            'limitTicket' => $maxTicket - $boughtTicket
        ]);
    }

    public function postIndex(Request $request)
    {
        dd($request->all());
    }
}
