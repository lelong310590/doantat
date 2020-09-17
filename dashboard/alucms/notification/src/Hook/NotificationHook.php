<?php
/**
 * NotificationHook.php
 * Created by: trainheartnet
 * Created at: 8/29/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Notification\Hook;

use AluCMS\Notification\Models\Notification;

class NotificationHook
{
    public function handle()
    {
        $cashInWaiting = Notification::where([
            ['status', '=', 'wait'],
            ['type', '=', 'cash_in'],
        ])->count();

        $withdrawWaiting = Notification::where([
            ['status', '=', 'wait'],
            ['type', '=', 'withdraw'],
        ])->count();


        echo view('notification::partials.sidebar', [
            'cashInWaiting' => $cashInWaiting,
            'withdrawWaiting' => $withdrawWaiting,
        ]);
    }
}
