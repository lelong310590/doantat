<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class DashboardController
 * @package AluCMS\Core\Http\Controllers
 */

namespace AluCMS\Core\Http\Controllers;

use AluCMS\Award\Models\Award;
use AluCMS\Lottery\Models\TicketDetail;
use AluCMS\User\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use AluCMS\User\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getIndex(UserRepository $userRepository)
    {

        $totalUser = User::role('player')->count();
        $monthUser = User::role('player')->whereMonth('created_at', date('m'))->count();
        $lastMonthUser = User::role('player')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $grownUserPercent = 100;
        if ($lastMonthUser > 0) {
            $grownUserPercent = round(($monthUser - $lastMonthUser) % $lastMonthUser * 100, 2);
        }

        $currentMonthTicket = TicketDetail::whereMonth('created_at', date('m'))->count();
        $lastMonthTicket = TicketDetail::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $grownTicketPercent = 100;
        if ($lastMonthTicket > 0) {
            $grownTicketPercent = round(($currentMonthTicket - $lastMonthTicket) % $lastMonthTicket * 100, 2);
        }

        $currentAward = Award::latest()->first();
        $ticketFromStartToNow = TicketDetail::whereBetween('created_at', [$currentAward->created_at, Carbon::now()])->count();
        $valueFromStartToNow = $ticketFromStartToNow * config('core.price_per_ticket');

        //Chart
        $chartDataTickets = [];
        $awardCost = [];
        $currentYear = Carbon::now()->format('Y');
        for ($i = 1; $i <= 12; $i++) {
            $startDayString = $i.'/1/'.$currentYear;

            $startDayInMonth = Carbon::parse($startDayString);
            $endDayInMonth = Carbon::parse($startDayString)->endOfMonth();

            $ticketInMonth = TicketDetail::whereBetween('created_at', [$startDayInMonth, $endDayInMonth])->count() * config('core.price_per_ticket');
            $chartDataTickets[] = $ticketInMonth;
            $awardCost[] = intval(config('core.start_award'));
        }


        $dangerNumber = TicketDetail::select(DB::raw('value, count(value)'))
                                    ->whereBetween('created_at', [$currentAward->created_at, Carbon::now()])
                                    ->groupBy('value')
                                    ->orderBy('count(value)', 'desc')
                                    ->get();

        return view('dashboard::index', [
            'totalUser' => $totalUser,
            'monthUser' => $monthUser,
            'lastMonthUser' => $lastMonthUser,
            'grownUserPercent' => $grownUserPercent,
            'currentMonthTicket' => $currentMonthTicket,
            'lastMonthTicket' => $lastMonthTicket,
            'grownTicketPercent' => $grownTicketPercent,
            'currentAward' => $currentAward->value,
            'ticketFromStartToNow' => $ticketFromStartToNow,
            'valueFromStartToNow' => $valueFromStartToNow,
            'chartDataTickets' => $chartDataTickets,
            'awardCost' => $awardCost,
            'dangerNumber' => $dangerNumber
        ]);
    }
}
