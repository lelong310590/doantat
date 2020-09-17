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

        $rating = config('core.rate_award');
        $startAward = config('core.start_award');
        $realProfitAward = $todayAward->value - $startAward;
        $showProfitAward = round(ceil($realProfitAward*$rating/100), 3);

        $showAward = $startAward + $showProfitAward;

        $todayBingo = Lottery::whereDate('created_at', $date)->first();
        if ($todayBingo != null) {

            $allticketWin = DB::table('ticket_details')
                ->where('value',$todayBingo->result_value)
                ->count();

            $awardPerUser = round(floor($showAward / $allticketWin), -4);

            $ticketDetailWinners = DB::table('lottery_tickets')
                ->join('ticket_details', 'lottery_tickets.id', '=', 'ticket_details.ticket_id')
                ->select(DB::raw('count(*) as count, lottery_tickets.user_id'))
                ->whereBetween('lottery_tickets.created_at', [$dateStart, $dateEnd])
                ->where('ticket_details.value', $todayBingo->result_value)
                ->groupBy('lottery_tickets.user_id')
                ->get();

            foreach ($ticketDetailWinners as $w) {
                DB::transaction(function () use ($awardPerUser, $w, $todayBingo) {
//                    send notification to winner
                    DB::table('notification')
                        ->insert([
                            'type' => 'win',
                            'amount' => $awardPerUser,
                            'status' => 'wait',
                            'user_id' => $w->user_id,
                            'content' => '
                            <p>Xin chúc mừng bạn đã thằng giải kỳ quay '.$todayBingo->result_date.': <b>'.$todayBingo->result_value.'</b></p>
                            <p>Số tiền thắng giải: <b>'.$awardPerUser*($w->count).'</b> đã được chuyển vào ví của bạn</p>
                        '
                        ]);

//                  Change money to user
                    $moneyGetByBoughtSameTicket = ($w->count) * $awardPerUser;
                    $wallet = DB::table('wallets')->select('id', 'user_id', 'amount')->where('user_id', '=', $w->user_id)->first();
                    DB::table('wallets')->where('id', $wallet->id)->update([
                        'amount' => $wallet->amount + $moneyGetByBoughtSameTicket
                    ]);
                });
            }

            DB::transaction(function () use ($todayAward) {
                //reset award
                DB::table('awards')->where('id', $todayAward->id)->update([
                    'status' => 'disable'
                ]);
                DB::table('awards')->insert([
                    'status' => 'active',
                    'value' => config('core.start_award'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            });
        }
    }
}
