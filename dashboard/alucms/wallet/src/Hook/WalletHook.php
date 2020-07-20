<?php
/**
 * WalletHook.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */

namespace AluCMS\Wallet\Hook;

class WalletHook
{
    public function handle()
    {
        echo view('wallet::partials.sidebar');
    }
}
