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
                                <form action="{{route('theme.user.post')}}" method="post" role="form">
                                    {{csrf_field()}}
                                    <legend class="fz-15 color-fff">Thông tin tài khoản</legend>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-md-push-2">
                                            <div class="form-group">
                                                <label for="">Tên đăng nhập</label>
                                                <input type="text" class="form-control" name="username" value="{{auth()->user()->username}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Họ và tên</label>
                                                <input type="text" class="form-control" name="full_name" value="{{auth()->user()->full_name}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone" value="{{auth()->user()->phone}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" value="{{auth()->user()->address}}">
                                            </div>
                                        </div>
                                    </div>

                                    <legend class="fz-15 color-fff">Mật khẩu</legend>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-md-push-2">
                                            <div class="form-group">
                                                <label for="">Mật khẩu cũ</label>
                                                <input type="password" class="form-control" name="password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mật khẩu mới</label>
                                                <input type="password" class="form-control" name="new_password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nhập lại mật khẩu mới</label>
                                                <input type="password" class="form-control" name="new_password_check" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <legend class="fz-15 color-fff">Mật khẩu thanh toán</legend>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-md-push-2">
                                            @if (auth()->user()->pay_password != null)
                                            <div class="form-group">
                                                <label for="">Mật khẩu cũ</label>
                                                <input type="password" class="form-control" name="pay_password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mật khẩu mới</label>
                                                <input type="password" class="form-control" name="new_paypassword" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nhập lại mật khẩu mới</label>
                                                <input type="password" class="form-control" name="new_paypassword_check" value="">
                                            </div>
                                            @else
                                                <p>Bạn chưa tạo mật khẩu thanh toán, hãy khởi tạo mật khẩu thanh toán lần đầu tiên</p>
                                                <div class="form-group">
                                                    <label for="">Tạo Mật khẩu</label>
                                                    <input type="password" class="form-control" name="pay_password" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nhập lại mật khẩu</label>
                                                    <input type="password" class="form-control" name="pay_password_check" value="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <button type="submit" class="site-button center-block mt-35">
                                        <span class="button-blue button-inner d-flex justify-center">Cập nhật</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

