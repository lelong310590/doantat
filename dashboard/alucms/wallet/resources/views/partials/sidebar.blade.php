<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<li>
    <a href="#sidebarWallet" data-toggle="collapse">
        <i data-feather="dollar-sign"></i>
        <span> @lang('wallet::wallet.sidebar.group') </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebarWallet">
        <ul class="nav-second-level">
            <li>
                <a href="{{route('alucms::wallet.index.get')}}">@lang('wallet::wallet.sidebar.wallet.index')</a>
            </li>
            <li>
                <a href="{{route('alucms::wallet.create.post')}}">@lang('wallet::wallet.sidebar.wallet.create')</a>
            </li>
        </ul>
    </div>
</li>

