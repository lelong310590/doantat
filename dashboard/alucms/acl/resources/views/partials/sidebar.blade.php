<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<li>
    <a href="#sidebarAcl" data-toggle="collapse">
        <i data-feather="lock"></i>
        <span> @lang('acl::acl.sidebar.group') </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebarAcl">
        <ul class="nav-second-level">
            <li>
                <a href="ecommerce-dashboard.html">@lang('acl::acl.sidebar.role.index')</a>
            </li>
            <li>
                <a href="{{route('alucms::role.create.post')}}">@lang('acl::acl.sidebar.role.create')</a>
            </li>
            <li>
                <a href="ecommerce-dashboard.html">@lang('acl::acl.sidebar.permission.index')</a>
            </li>
        </ul>
    </div>
</li>