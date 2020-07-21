<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<li>
    <a href="{{route('alucms::lottery.index.get')}}">
        <i data-feather="target"></i>
        <span> @lang('lottery::lottery.sidebar_lottery_index') </span>
    </a>
</li>

<li>
    <a href="{{route('alucms::ticket.index.get')}}">
        <i class="mdi mdi-ticket"></i>
        <span> @lang('lottery::lottery.sidebar_ticket_index') </span>
    </a>
</li>

