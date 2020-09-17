<?php
/**
 * ThemeController.php
 * Created by: trainheartnet
 * Created at: 7/24/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Controllers;

use AluCMS\Award\Models\Award;
use AluCMS\Lottery\Models\Lottery;
use AluCMS\Lottery\Models\TicketDetail;
use Barryvdh\Debugbar\Controllers\BaseController;
use Carbon\Carbon;

class ThemeController extends BaseController
{
    public function getHome()
    {
        $rating = config('core.rate_award');
        $startAward = config('core.start_award');
        $currentAward = Award::latest()->first();
        $realProfitAward = $currentAward->value - $startAward;
        $showProfitAward = round(ceil($realProfitAward*$rating/100), 3);

        $showAward = $startAward + $showProfitAward;

        $latestResult = Lottery::latest()->first();

        return view('theme::layouts.home', [
            'currentAward' => $showAward,
            'latestResult' => $latestResult
        ]);
    }
}
