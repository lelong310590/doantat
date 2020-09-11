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
use Barryvdh\Debugbar\Controllers\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThemeBuyTicketController extends BaseController
{
    public function getIndex()
    {
        $currentAward = Award::where('status', 'active')->first(['value', 'created_at']);
        $ticketFromStartToNow = TicketDetail::whereBetween('created_at', [$currentAward->created_at, Carbon::now()])->count();
        $valueFromStartToNow = $ticketFromStartToNow * config('core.price_per_ticket');

        return view('theme::layouts.buyticket_index', [
            'currentAward' => $currentAward->value,
            'valueFromStartToNow' => $valueFromStartToNow,
            'limitTicket' => config('core.limit_ticket')
        ]);
    }

    public function postIndex(Request $request)
    {
        dd($request->all());
    }
}
