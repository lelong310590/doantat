<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 8/30/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<li>
    <a href="{{route('alucms::notification.index.get')}}">
        <i data-feather="bell"></i>
        <span class="badge badge-success badge-pill float-right">{{$waiting}}</span>
        <span> @lang('notification::notification.sidebar_notification_index') </span>
    </a>
</li>
