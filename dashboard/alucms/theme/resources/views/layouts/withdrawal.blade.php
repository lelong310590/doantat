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
                                <form action="{{route('theme.pay.post')}}" method="post" role="form">
                                    {{csrf_field()}}
                                    <legend class="fz-15 color-fff">Yêu cầu rút tiền</legend>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                            <div class="form-group">
                                                <label for="">Tên đăng nhập</label>
                                                <input type="text" class="form-control" name="username" value="{{auth()->user()->username}}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Số tiền muốn rút</label>
                                                <select name="amount" id="" class="form-control">
                                                    <option value="100000"> 100,000 VNĐ</option>
                                                    <option value="200000"> 200,000 VNĐ</option>
                                                    <option value="500000"> 500,000 VNĐ</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="site-button center-block mt-35">
                                                <span class="button-blue button-inner d-flex justify-center">Rút tiền</span>
                                            </button>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <p>- Anh chị có thể đến bất kỳ ngân hàng nào ở Việt Nam hoặc anh chị có thể sử dụng dịch vụ Internet Banking để chuyển tiền đăng ký khóa học theo thông tin:</p>
                                            <ul>
                                                <li>
                                                    Tài khoản ngân hàng Teckcombank:<br/>
                                                    Số tài khoản: 1332 4859 765 016<br/>
                                                    Chủ tài khoản: Nguyễn Anh Toàn<br/>
                                                </li>
                                            </ul>
                                            <p>* Ghi chú khi chuyển khoản</p>
                                            <p>- Tại mục "Ghi chú" khi chuyển khoản, Anh chị vui lòng ghi rõ:</p>
                                            <p>Họ Tên - Email tài khoản - Số điện thoại - Khóa học / combo đăng ký</p>
                                            <p>Ví dụ: Nguyen Thu Phuong - phuongnguyen19@gmail.com - 088 6677 667 - Khoa hoc co ban 1</p>
                                            <p>- Ngay sau khi chúng tôi nhận được thông tin chuyển khoản, chúng tôi sẽ tiến hành kích hoạt khóa học cho bạn.</p>
                                        </div>
                                    </div>
                                </form>
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

