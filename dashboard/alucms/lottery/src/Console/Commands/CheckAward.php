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
        if ($todayBingo != null) {

            $allticketWin = DB::table('ticket_details')
                ->where('value',$todayBingo->result_value)
                ->count();

            $awardPerUser = floor($todayAward->value / $allticketWin);

            $ticketDetailWinners = DB::table('lottery_tickets')
                ->join('ticket_details', 'lottery_tickets.id', '=', 'ticket_details.ticket_id')
                ->select('lottery_tickets.user_id')
                ->whereBetween('lottery_tickets.created_at', [$dateStart, $dateEnd])
                ->where('ticket_details.value', $todayBingo->result_value)
                ->get()
                ->groupBy('lottery_tickets.user_id');

            $winner = [];

            foreach ($ticketDetailWinners as $w) {
                //send notification to winner
                DB::table('notification')
                    ->insert([
                        'type' => 'win',
                        'amount' => $awardPerUser,
                        'status' => 'processed',
                        'user_id' => $w[0]->user_id,
                        'content' => '
                            <p>Xin chúc mừng bạn đã thằng giải kỳ quay '.$todayBingo->result_date.': <b>'.$todayBingo->result_value.'</b></p>
                            <p>Số tiền thắng giải: <b>'.$awardPerUser.'</b></p>
                        '
                    ]);

                // Change money to user
//                DB::table('wallets')
//                    ->
            }

            $i = 1;
            foreach ($ticketDetailWinners as $w) {
                $winner['user_'.$i]['id'] = $w[0]->user_id;
                $winner['user_'.$i]['time'] = count($w);
                $i++;
            }

            //$winnerUser = User::whereIn('id', $winnerId)->get();

            dd($ticketDetailWinners);
        }
    }
}
