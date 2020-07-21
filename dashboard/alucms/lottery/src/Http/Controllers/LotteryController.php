<?php
/**
 * LotteryController.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Http\Controllers;

use AluCMS\Lottery\Repositories\LotteryRepository;
use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class LotteryController extends BaseController
{
    protected $lottery;

    public function __construct(Request $request, LaravelDebugbar $debugbar, LotteryRepository $lotteryRepository)
    {
        parent::__construct($request, $debugbar);
        $this->lottery = $lotteryRepository;
    }

    public function getIndex()
    {
        return view('lottery::index', [
            'result' => $this->lottery->orderBy('created_at', 'desc')->paginate(config('core.paginate'))
        ]);
    }
}
