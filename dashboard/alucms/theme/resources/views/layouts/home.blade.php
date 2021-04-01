<?php
/**
 * home.blade.php
 * Created by: trainheartnet
 * Created at: 7/24/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('theme::master')

@section('content')
    <main class="main" id="main">
        <div class="main-banner pt-50 pb-50 po-relative">
            <img src="{{asset('themes/doantat/lib/images/banner.png')}}" alt="" class="img-responsive center-block">
            <div id="main-award" class="main-award d-flex justify-center align-center color-fff fw-900 fz-55 po-absolute po-b-90 po-l-0 w-100p lh-72 m-fz-27 m-po-b-64">
                {{number_format($currentAward)}}
            </div>
        </div>

{{--        <div class="home-lottery-result text-center color-fff fw-700 fz-20 @auth mb-25 @endauth">--}}
{{--            Kết quả kỳ quay {{$latestResult->result_date}} :--}}
{{--            <div class="home-lottery-table-result">--}}
{{--                <table class="table fz-14">--}}
{{--                    <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>Đặt biệt</td>--}}
{{--                            <td class="table-result"><div class="fz-25">{{$latestResult->result_value}}</div></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Giải nhất</td>--}}
{{--                            <td class="table-result"><div class="fz-25">{{$latestResult->rs_1_0}}</div></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Giải nhì</td>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_2_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_2_1}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td rowspan="2">Giải ba</td>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_3_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_3_1}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_3_2}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_3_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_3_1}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_3_2}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Giải tư</td>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_4_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_4_1}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_4_2}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_4_3}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td rowspan="2">Giải năm</td>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_5_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_5_1}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_5_2}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_5_3}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_5_4}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_5_5}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Giải sáu</td>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_6_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_6_1}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_6_2}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Giải bảy</td>--}}
{{--                            <td class="table-result">--}}
{{--                                <div class="fz-25">{{$latestResult->rs_7_0}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_7_1}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_7_2}}</div>--}}
{{--                                <div class="fz-25">{{$latestResult->rs_7_3}}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @if (Agent::isMobile())--}}
        <div class="d-flex justify-center align-center m-pt-10 m-pb-10 d-pt-20 d-pb-20">
            <a class="site-button center-block" id="reject-buy-ticket" href="{{route('theme::lode.index')}}">
                <span class="button-red button-inner d-flex justify-center">Lô đề MB</span>
            </a>

            <a class="site-button center-block" id="reject-buy-ticket" href="{{route('theme.buyticket.get')}}">
                <span class="button-blue button-inner d-flex justify-center">Vào gà MB</span>
            </a>
        </div>
{{--        @else--}}
{{--            @auth--}}
{{--                <div class="d-flex justify-center align-center">--}}
{{--                    <a class="site-button center-block" id="reject-buy-ticket" href="{{route('theme.buyticket.get')}}">--}}
{{--                        <span class="button-red button-inner d-flex justify-center">Mua vé</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endauth--}}
{{--        @endif--}}

{{--        <div class="billboard-wrapper color-fff col-xs-12 col-md-6 col-md-push-3 mt-50">--}}
{{--            <p class="text-center color-fff fw-700">Danh sách trúng thưởng kỳ gần nhất</p>--}}
{{--            <table class="table table-hover table-bordered main-table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th width="50">#</th>--}}
{{--                    <th width="200">Tài khoản</th>--}}
{{--                    <th width="150">SĐT</th>--}}
{{--                    <th width="150">Kỳ trúng thưởng</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @forelse($billBoard as $b)--}}
{{--                    <tr>--}}
{{--                        <td></td>--}}
{{--                        <td>{{$b->user->username}}</td>--}}
{{--                        <td>{{$b->user->phone}}</td>--}}
{{--                        <td>{{$b->result_date}}</td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr>--}}
{{--                        <td colspan="4">Chưa có người trúng giải</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
    </main>

    <div class="lode-icon float-icon po-fixed po-r-10 z-10">
        <a href="{{route('theme::lode.index')}}" class="d-flex justify-center align-center dir-column">
            <p class="text-center color-fff fz-20 fw-700">XSMB</p>
            <img src="{{asset('themes/doantat/lib/images/mayquayso.png')}}" alt="" class="img-responsive center-block w-93">
        </a>
    </div>
@endsection
