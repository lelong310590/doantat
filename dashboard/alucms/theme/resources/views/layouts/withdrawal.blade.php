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
                                        <p>- Mỗi ngày chỉ rút (5) lần, bạn đã yêu cầu thành công ({{$successWithdrawal->count()}}) lần trong hôm nay.</p>
                                        <p>- Rút tiền 24/7.</p>
                                        <p>- Tài khoản ngân hàng mới thêm cần 6 tiếng trở lên mới có thể rút tiền.</p>
                                    </div>

                                    <div class="col-xs-12 col-md-8 col-md-push-2">
                                        <form action="{{route('theme.withdrawal.post')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="d-flex justify-start align-center mb-15">
                                                <p class="mb-0 mr-10">Số dư có thể rút</p>
                                                <money class="fw-700 mr-5">{{number_format($balance)}}</money>
                                                <img src="{{asset('themes/doantat/lib/images/coin.png')}}" alt="" class="img-responsive w-20">
                                            </div>

                                            <div class="form-group">
                                                <label for="bank_name">Ngân hàng nhận tiền</label>
                                                <select name="bank_name" id="bank_name" class="form-control">
                                                    @foreach($banks as $b)
                                                        <option value="{{$b->id}}">{{$b->bank_name}} | Số cuối tài khoản: {{\Illuminate\Support\Str::substr($b->bank_number, -4)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="amount">Số tiền rút</label>
                                                <input type="text" class="form-control" id="amount_withdrawal" name="amount" value="0" data-max="{{intval($balance)}}">
                                                <small>( Số tiền tối thiểu 200,000 VND / Số tiền tối đa 100,000,000 VND )</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="amount">Mật khẩu thanh toán</label>
                                                <input type="password" class="form-control" name="pay_password">
                                            </div>

                                            <button type="submit" class="site-button center-block mt-35">
                                                <span class="button-blue button-inner d-flex justify-center">Rút tiền</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-list mt-30">
                                <legend class="fz-15 color-fff">Lịch sử rút tiền</legend>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

