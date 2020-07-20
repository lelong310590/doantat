<?php
/**
 * LotteryHook.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Hook;

class LotteryHook
{
    public function handle()
    {
        echo view('lottery::partials.sidebar');
    }
}
