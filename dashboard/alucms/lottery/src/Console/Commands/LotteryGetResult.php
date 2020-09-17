<?php
/**
 * GetResult.php
 * Created by: trainheartnet
 * Created at: 7/18/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Lottery\Console\Commands;

use AluCMS\Lottery\Models\Lottery;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\HttpClient\HttpClient;

class LotteryGetResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_lottery_result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Using for get lottery result';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'http://ketqua.net';
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $lottery = new Lottery();
        $crawler = $client->request('GET', $url);

        $resultDate = $crawler->filter('span#result_date')->text();
        $check = $lottery->where('result_date', $resultDate);

        $result6 = $crawler->filter('td#rs_0_0')->text();
        $result3 = substr($result6, 2);

        if ($check->count() < 1 ) {
            $lottery->result_date = $resultDate;
            $lottery->result_value = $result3;
            $lottery->save();
        } else {
            if ($check->first()->result_value == '') {
                $lottery = $check->first();
                $lottery->result_value = $result3;
                $lottery->save();
            }
        }

        return false;
    }
}
