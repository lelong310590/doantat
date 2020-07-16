<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<li>
    <a href="#sidebarUser" data-toggle="collapse">
        <i data-feather="user"></i>
        <span> @lang('user::user.sidebar.group') </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebarUser">
        <ul class="nav-second-level">
            <li>
                <a href="{{route('alucms::user.index.get')}}">@lang('user::user.sidebar.user.index')</a>
            </li>
            <li>
                <a href="{{route('alucms::user.create.post')}}">@lang('user::user.sidebar.user.create')</a>
            </li>
        </ul>
    </div>
</li>
