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
                                        <div class="col-xs-12 col-md-6">
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

                                        <div class="col-xs-12 col-md-6">
                                            <div class="user-avatar w-150 h-150 center-block d-flex justify-center align-center">
                                                <a data-fancybox data-type="iframe" data-src="{{config('app.url')}}/filemanager/dialog.php?type=1&fldr={{auth()->user()->username}}&field_id=preview" href="javascript:;">
                                                    @if (auth()->user()->thumbnail != '')
                                                        <img src="{{auth()->user()->thumbnail}}" alt="" class="img-responsive w-150 center-block">
                                                    @else
                                                        <img src="https://via.placeholder.com/150x150?text={{auth()->user()->username}}" alt="" class="img-responsive w-150 center-block">
                                                    @endif
                                                </a>
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

