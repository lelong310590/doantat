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
use AluCMS\Theme\Http\Requests\BuyTicketRequest;
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
        $checkAllowTime = $this->checkAllowTime();

        return view('theme::layouts.buyticket_index', [
            'currentAward' => $currentAward->value,
            'valueFromStartToNow' => $valueFromStartToNow,
            'limitTicket' => $maxTicket - $boughtTicket,
            'checkAllowTime' => $checkAllowTime
        ]);
    }

    public function postIndex(BuyTicketRequest $request, TicketRepository $ticketRepository)
    {
        $ticketValue = $request->get('tickets');

        try {
            $bought = $ticketRepository->boughtTicket($ticketValue);
            return redirect()->route('theme::home.get')->with([
                'message' => $bought
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Có lỗi xẩy ra trong quá trình thực thi');
        }
    }

    public function checkAllowTime()
    {
        $date = Carbon::now();
        $dateStart = $date->startOfDay();
        $dateEnd = $dateStart->addHours(18);

        return $date->lessThanOrEqualTo($dateEnd);
    }
}
