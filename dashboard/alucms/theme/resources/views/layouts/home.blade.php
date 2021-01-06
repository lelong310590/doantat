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
        <div class="container">
            <div class="col-xs-12 col-md-6">

            </div>
            <div class="main-banner mt-50 mb-50 po-relative">
                <img src="{{asset('themes/doantat/lib/images/banner.png')}}" alt="" class="img-responsive center-block">
                <div id="main-award" class="main-award d-flex justify-center align-center color-fff fw-900 fz-72 po-absolute po-b-90 po-l-0 w-100p lh-72">
                    {{number_format($currentAward)}}
                </div>
            </div>

            <div class="home-lottery-result text-center color-fff fw-700 fz-20 @auth mb-25 @endauth">
                Kết quả kỳ quay {{$latestResult->result_date}} : <span class="fz-25">{{$latestResult->result_value}}</span>
            </div>

            @auth
            <div class="d-flex justify-center align-center">
                <a class="site-button center-block" id="reject-buy-ticket" href="{{route('theme.buyticket.get')}}">
                    <span class="button-red button-inner d-flex justify-center">Mua vé</span>
                </a>
            </div>
            @endauth

            <div class="billboard-wrapper color-fff col-xs-12 col-md-6 col-md-push-3 mt-50">
                <p class="text-center color-fff fw-700">Danh sách trúng thưởng kỳ gần nhất</p>
                <table class="table table-hover table-bordered main-table">
                    <thead>
                    <tr>
                        <th width="50">#</th>
                        <th width="200">Tài khoản</th>
                        <th width="150">SĐT</th>
                        <th width="150">Kỳ trúng thưởng</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($billBoard as $b)
                        <tr>
                            <td></td>
                            <td>{{$b->user->username}}</td>
                            <td>{{$b->user->phone}}</td>
                            <td>{{$b->result_date}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Chưa có người trúng giải</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="lode-icon float-icon po-fixed po-r-10 z-10">
        <a href="{{route('theme::lode.index')}}" class="d-flex justify-center align-center dir-column">
            <p class="text-center color-fff fz-20 fw-700">XSMB</p>
            <img src="{{asset('themes/doantat/lib/images/mayquayso.png')}}" alt="" class="img-responsive center-block w-93">
        </a>
    </div>
@endsection
