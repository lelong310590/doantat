<?php
/**
 * bank_index.blade.php
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
                                <legend class="fz-15 color-fff">Tải khoản ngân hàng</legend>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>- Bạn có thể thêm tối đa 5 tài khoản ngân hàng. Hiện tại bạn đang có 0 tài khoản.</p>
                                        <p>- Từ tài khoản ngân hàng thứ 2 trở đi phải trùng tên chủ tài khoản với tài khoản đầu tiên</p>
                                        <p>- Nếu bạn khoá danh sách tài khoản, bạn sẽ không thể thêm mới hoặc xoá tài khoản ngân hàng</p>
                                        <p>- Doantat không hỗ trợ rút tiền về số thẻ ATM và Viettel Pay</p>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-list mt-30">
                                <table class="table table-hover table-bordered main-table">
                                    <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="200">Tên ngân hàng</th>
                                        <th width="200">Số tài khoản</th>
                                        <th width="150">Ngày thêm</th>
                                        <th width="50"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($bank as $b)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$b->bank_name}}</td>
                                            <td>{{$b->bank_number}}</td>
                                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $b->created_at)->format('Y-m-d')}}</td>
                                            <td class="text-center">
                                                <a href="{{route('theme.bank_delete.get', $b->id)}}" class="table-button">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Chưa có tài khoản nào</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="bank-list-action d-flex justify-center align-center">
                                <a href="{{route('theme.bank_create.get')}}" class="site-button center-block mt-35">
                                    <span class="button-blue button-inner d-flex justify-center">Thêm tài khoản</span>
                                </a>

                                <a class="site-button center-block mt-35">
                                    <span class="button-red button-inner d-flex justify-center">Khoá danh sách</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


