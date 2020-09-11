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
        $waiting = Notification::where('status', 'wait')->count();
        echo view('notification::partials.sidebar', [
            'waiting' => $waiting
        ]);
    }
}
