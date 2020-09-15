<?php
/**
 * user_index.blade.php
 * Created by: trainheartnet
 * Created at: 7/27/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('theme::master')

@section('content')
    <main class="main" id="main">
        <div class="container">
            <div class="user-wrapper pt-50 pb-50">
                <div class="col-xs-12 col-md-3">
                    @include('theme::partials.user_sidebar')
                </div>

                <div class="col-xs-12 col-md-9">
                    <div class="dialog-wrapper color-fff pa-3">
                        <div class="dialog-wrapper-inner pa-40">
                            <div class="userinfo color-fff">
                                <legend class="fz-15 color-fff">Yêu cầu rút tiền</legend>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>- Bạn có thể thêm tối đa 5 tài khoản ngân hàng. Hiện tại bạn đang có 0 tài khoản.</p>
                                        <p>- Từ tài khoản ngân hàng thứ 2 trở đi phải trùng tên chủ tài khoản với tài khoản đầu tiên</p>
                                        <p>- Nếu bạn khoá danh sách tài khoản, bạn sẽ không thể thêm mới hoặc xoá tài khoản ngân hàng</p>
                                        <p>- Doantat không hỗ trợ rút tiền về số thẻ ATM và Viettel Pay</p>
                                    </div>

                                    <div class="col-xs-12 col-md-6">


                                        <button type="submit" class="site-button center-block mt-35">
                                            <span class="button-blue button-inner d-flex justify-center">Rút tiền</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-list mt-30">
                                <legend class="fz-15 color-fff">Lịch sử nạp tiền</legend>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

