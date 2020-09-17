<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 8/30/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<li>
    <a href="#sidebarNotification" data-toggle="collapse">
        <i data-feather="bell"></i>
        <span class="badge badge-success badge-pill float-right">{{$cashInWaiting + $withdrawWaiting}}</span>
        <span> Yêu cầu giao dịch </span>
    </a>
    <div class="collapse" id="sidebarNotification">
        <ul class="nav-second-level">
            <li>
                <a href="{{route('alucms::notification.index.get', ['type' => 'cash_in'])}}">
                    <span class="badge badge-success badge-pill float-right">{{$cashInWaiting}}</span>
                    <span>Nạp tiền</span>
                </a>
            </li>
            <li>
                <a href="{{route('alucms::notification.index.get', ['type' => 'withdraw'])}}">
                    <span class="badge badge-success badge-pill float-right">{{$withdrawWaiting}}</span>
                    <span>Rút tiền</span>
                </a>
            </li>
        </ul>
    </div>
</li>
