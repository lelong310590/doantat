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
        <div class="sidebar-item {{Route::currentRouteName() == 'theme.buyticket.get' ? 'active' : ''}}">
            <a href="{{route('theme.buyticket.get')}}" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/bingo.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Mua vé</span>
            </a>
        </div>

        <div class="sidebar-item {{Route::currentRouteName() == 'theme.user.get' ? 'active' : ''}}">
            <a href="{{route('theme.user.get')}}" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/info.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Thông tin tài khoản</span>
            </a>
        </div>

        <div class="sidebar-item {{Route::currentRouteName() == 'theme.pay.get' ? 'active' : ''}}">
            <a href="{{route('theme.pay.get')}}" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/money.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Nạp tiền</span>
            </a>
        </div>

        <div class="sidebar-item {{Route::currentRouteName() == 'theme.withdrawal.get' ? 'active' : ''}}">
            <a href="{{route('theme.withdrawal.get')}}" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/withdraw.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Rút tiền</span>
            </a>
        </div>

        <div class="sidebar-item {{Route::currentRouteName() == 'theme.bank_index.get' ? 'active' : ''}}">
            <a href="{{route('theme.bank_index.get')}}" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/bank-account.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Tài khoản ngân hàng</span>
            </a>
        </div>

        <div class="sidebar-item {{Route::currentRouteName() == 'theme.history.get' ? 'active' : ''}}">
            <a href="{{route('theme.history.get')}}" class="d-flex justify-start align-center">
                <img src="{{asset('themes/doantat/lib/images/bill.png')}}" alt="" class="img-responsive w-28 mr-10">
                <span class="fz-14">Lịch sử chơi</span>
            </a>
        </div>
    </div>
</div>
