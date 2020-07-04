<?php
/**
 * AclHook.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Hook;


class AclHook
{
    public function handle()
    {
        echo view('acl::partials.sidebar');
    }
}