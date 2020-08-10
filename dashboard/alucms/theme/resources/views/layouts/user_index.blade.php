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
                                <form action="" method="post" role="form">
                                    <legend class="fz-15 color-fff">Thông tin tài khoản</legend>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Tên đăng nhập</label>
                                                <input type="text" class="form-control" name="" id="" value="{{auth()->user()->username}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" name="" id="" value="{{auth()->user()->email}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Họ và tên</label>
                                                <input type="text" class="form-control" name="" id="" value="{{auth()->user()->full_name}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" class="form-control" name="" id="" value="{{auth()->user()->phone}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" class="form-control" name="" id="" value="{{auth()->user()->address}}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <div class="user-avatar w-150 h-150 center-block d-flex justify-center align-center">
                                                @if (auth()->user()->thumbnail != '')
                                                    <img src="{{auth()->user()->thumbnail}}" alt="" class="img-responsive w-150 center-block">
                                                @else
                                                    <img src="https://via.placeholder.com/150x150?text={{auth()->user()->username}}" alt="" class="img-responsive w-150 center-block">
                                                @endif
                                            </div>
                                            <p class="text-center mt-15 color-fff fw-700 mt-15">Ảnh đại diện</p>
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

