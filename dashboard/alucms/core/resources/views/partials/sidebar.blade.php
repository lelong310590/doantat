<?php
/**
 * sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li class="menu-title">@lang('dashboard::dashboard.sidebar.navigation')</li>
                <li>
                    <a href="{{route('alucms::dashboard.index.get')}}">
                        <i data-feather="airplay"></i>
                        <span> @lang('dashboard::dashboard.sidebar.dashboard') </span>
                    </a>
                </li>

                @php do_action('alucms-register-menu') @endphp

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

