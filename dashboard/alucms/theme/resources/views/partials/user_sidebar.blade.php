<?php
/**
 * user_sidebar.blade.php
 * Created by: trainheartnet
 * Created at: 7/27/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<div class="sidebar pa-3">
    <div class="sidebar-inner">
        <div class="sidebar-item {{Route::currentRouteName() == 'theme.user.get' ? 'active' : ''}}">
            <a href="javascript:;" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/info.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Thông tin tài khoản</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="javascript:;" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/money.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Nạp tiền</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="javascript:;" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/bill.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Lịch sử chơi</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="javascript:;" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/bank.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Thông tin thanh toán</span>
            </a>
        </div>
    </div>
</div>
