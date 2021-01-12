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
        $client = new Client(HttpClient::create(['timeout' => 3000]));
        $lottery = new Lottery();
        $crawler = $client->request('GET', $url);

        $resultDate = $crawler->filter('span#result_date')->text();
        $check = $lottery->where('result_date', $resultDate);

        $result0 = $crawler->filter('#rs_0_0')->text();
        $rs_1_0 = $crawler->filter('#rs_1_0')->text();
        $rs_2_0 = $crawler->filter('#rs_2_0')->text();
        $rs_2_1 = $crawler->filter('#rs_2_1')->text();
        $rs_3_0 = $crawler->filter('#rs_3_0')->text();
        $rs_3_1 = $crawler->filter('#rs_3_1')->text();
        $rs_3_2 = $crawler->filter('#rs_3_2')->text();
        $rs_3_3 = $crawler->filter('#rs_3_3')->text();
        $rs_3_4 = $crawler->filter('#rs_3_4')->text();
        $rs_3_5 = $crawler->filter('#rs_3_5')->text();
        $rs_4_0 = $crawler->filter('#rs_4_0')->text();
        $rs_4_1 = $crawler->filter('#rs_4_1')->text();
        $rs_4_2 = $crawler->filter('#rs_4_2')->text();
        $rs_4_3 = $crawler->filter('#rs_4_3')->text();
        $rs_5_0 = $crawler->filter('#rs_5_0')->text();
        $rs_5_1 = $crawler->filter('#rs_5_1')->text();
        $rs_5_2 = $crawler->filter('#rs_5_2')->text();
        $rs_5_3 = $crawler->filter('#rs_5_3')->text();
        $rs_5_4 = $crawler->filter('#rs_5_4')->text();
        $rs_5_5 = $crawler->filter('#rs_5_5')->text();
        $rs_6_0 = $crawler->filter('#rs_6_0')->text();
        $rs_6_1 = $crawler->filter('#rs_6_1')->text();
        $rs_6_2 = $crawler->filter('#rs_6_2')->text();
        $rs_7_0 = $crawler->filter('#rs_7_0')->text();
        $rs_7_1 = $crawler->filter('#rs_7_1')->text();
        $rs_7_2 = $crawler->filter('#rs_7_2')->text();
        $rs_7_3 = $crawler->filter('#rs_7_3')->text();

        if ($check->count() < 1 ) {
            $lottery->result_date = $resultDate;
            $lottery->result_value = $result0;
            $lottery->rs_1_0 = $rs_1_0;
            $lottery->rs_2_0 = $rs_2_0;
            $lottery->rs_2_1 = $rs_2_1;
            $lottery->rs_3_0 = $rs_3_0;
            $lottery->rs_3_1 = $rs_3_1;
            $lottery->rs_3_2 = $rs_3_2;
            $lottery->rs_3_3 = $rs_3_3;
            $lottery->rs_3_4 = $rs_3_4;
            $lottery->rs_3_5 = $rs_3_5;
            $lottery->rs_4_0 = $rs_4_0;
            $lottery->rs_4_1 = $rs_4_1;
            $lottery->rs_4_2 = $rs_4_2;
            $lottery->rs_4_3 = $rs_4_3;
            $lottery->rs_5_0 = $rs_5_0;
            $lottery->rs_5_1 = $rs_5_1;
            $lottery->rs_5_2 = $rs_5_2;
            $lottery->rs_5_3 = $rs_5_3;
            $lottery->rs_5_4 = $rs_5_4;
            $lottery->rs_5_5 = $rs_5_5;
            $lottery->rs_6_0 = $rs_6_0;
            $lottery->rs_6_1 = $rs_6_1;
            $lottery->rs_6_2 = $rs_6_2;
            $lottery->rs_7_0 = $rs_7_0;
            $lottery->rs_7_1 = $rs_7_1;
            $lottery->rs_7_2 = $rs_7_2;
            $lottery->rs_7_3 = $rs_7_3;
            $lottery->save();
        }

        return false;
    }
}
