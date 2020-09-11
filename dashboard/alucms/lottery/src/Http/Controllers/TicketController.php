<?php
/**
 * TicketController.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Http\Controllers;

use AluCMS\Lottery\Repositories\TicketRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends BaseController
{
    protected $ticket;

    public function __construct(Request $request, LaravelDebugbar $debugbar, TicketRepository $ticketRepository)
    {
        parent::__construct($request, $debugbar);
        $this->ticket = $ticketRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request) : View
    {
        $keywords = $request->get('keywords');
        $ticket = $this->ticket->with('user')->with('ticketDetail')->paginate(config('core.paginate'));
        if ($keywords) {
            $ticket = $this->ticket->search($keywords);
        }

        return view('lottery::tickets.index', [
            'ticket' => $ticket
        ]);
    }
}
