<?php
/**
 * ThemeController.php
 * Created by: trainheartnet
 * Created at: 7/24/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Award\Models\Award;
use AluCMS\Lottery\Models\TicketDetail;
use Barryvdh\Debugbar\Controllers\BaseController;
use Carbon\Carbon;

class ThemeController extends BaseController
{
    public function getHome()
    {
        $currentAward = Award::latest()->first();
        $ticketFromStartToNow = TicketDetail::whereBetween('created_at', [$currentAward->created_at, Carbon::now()])->count();
        $valueFromStartToNow = $ticketFromStartToNow * config('core.price_per_ticket');

        return view('theme::layouts.home', [
            'currentAward' => $currentAward->value,
            'valueFromStartToNow' => $valueFromStartToNow
        ]);
    }
}
