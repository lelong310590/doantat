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
            <div class="main-banner mt-50 mb-50 po-relative">
                <img src="{{asset('themes/doantat/lib/images/banner.png')}}" alt="" class="img-responsive center-block">
                <div id="main-award" class="main-award d-flex justify-center align-center color-fff fw-900 fz-72 po-absolute po-b-90 po-l-0 w-100p lh-72">
                    {{number_format($currentAward + $valueFromStartToNow)}}
                </div>
            </div>

            <div class="home-lottery-result">
                Kết quả
            </div>

            @auth
            <div class="d-flex justify-center align-center">
                <a class="site-button center-block" id="reject-buy-ticket" href="{{route('theme.buyticket.get')}}">
                    <span class="button-red button-inner d-flex justify-center">Mua vé</span>
                </a>
            </div>
            @endauth
        </div>
    </main>
@endsection
