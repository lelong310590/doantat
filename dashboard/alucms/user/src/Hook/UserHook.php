<?php
/**
 * UserHook.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\User\Hook;


class UserHook
{
    public function handle()
    {
        echo view('user::partials.sidebar');
    }
}
