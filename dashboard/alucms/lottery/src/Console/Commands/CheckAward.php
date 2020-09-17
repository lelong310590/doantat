<?php
/**
 * CheckAward.php
 * Created by: trainheartnet
 * Created at: 9/13/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Console\Commands;

use AluCMS\Award\Models\Award;
use AluCMS\Lottery\Models\Lottery;
use AluCMS\User\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckAward extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_award';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking for award';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $date = Carbon::now()->format('Y/m/d');
        $dateStart = Carbon::parse($date.' 00:00:00');
        $dateEnd = Carbon::parse($date.' 18:00:00');
        $todayAward = Award::latest()->first();
        $todayBingo = Lottery::whereDate('created_at', $date)->first();
        //dd($todayBingo);
        $ticketDetailWinners = DB::table('lottery_tickets')
                                ->join('ticket_details', 'lottery_tickets.id', '=', 'ticket_details.ticket_id')
                                ->select('lottery_tickets.user_id')
                                ->whereBetween('lottery_tickets.created_at', [$dateStart, $dateEnd])
                                ->where('ticket_details.value', $todayBingo->result_value)
                                ->get()
                                ->groupBy('lottery_tickets.user_id');

        $winnerId = [];
        foreach ($ticketDetailWinners as $w) {
            $winnerId[] = $w[0]->user_id;
        }

        $winnerUser = User::whereIn('id', $winnerId)->get();



        $this->info($winnerUser);
    }
}
