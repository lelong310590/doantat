<?php
/**
 * bank_create.blade.php
 * Created by: trainheartnet
 * Created at: 9/15/20
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
                                <form action="{{route('theme.bank_create.post')}}" method="post" role="form">
                                    {{csrf_field()}}
                                    <legend class="fz-15 color-fff">Thêm tài khoản ngân hàng</legend>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="bank_name">Tên ngân hàng:</label>
                                                <select name="bank_name" class="form-control mb-40">
                                                    @foreach($listBanks as $b)
                                                        <option value="{{$b}}">{{$b}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="bank_branch">Chi nhánh:</label>
                                                <input type="text" class="form-control" name="bank_branch" value="" maxlength="30" minlength="2">
                                                <small>Từ 2 đến 30 kí tự</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="bank_holder">Họ tên chủ tài khoản:</label>
                                                <input type="text" class="form-control" name="bank_holder" value="" maxlength="30" minlength="2">
                                                <small>Tên tài khoản nên là chữ IN HOA và không dấu</small>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="bank_number">Số tài khoản:</label>
                                                <input type="text" class="form-control" name="bank_number" value="" maxlength="30" minlength="2">
                                                <small>Điền đúng số tài khoản, không phải số thẻ ATM</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="bank_number_check">Nhập lại số tài khoản:</label>
                                                <input type="text" class="form-control" name="bank_number_check" value="" maxlength="30" minlength="2">
                                                <small>Xác nhận lại tài khoản ngân hàng</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="pay_password">Mật khẩu thanh toán:</label>
                                                <input type="password" class="form-control" name="pay_password" value="" maxlength="30" minlength="2">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="site-button center-block mt-35">
                                        <span class="button-blue button-inner d-flex justify-center">Thêm tài khoản</span>
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



