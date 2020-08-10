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
        </div>
    </main>
@endsection
