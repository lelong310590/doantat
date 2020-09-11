<?php
/**
 * buyticket_index.php
 * Created by: trainheartnet
 * Created at: 9/12/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

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
                            <p>Kỳ quay thưởng: <span class="fz-14 lh-14 bg-color-fff pl-3 pr-3 pt-5 pb-5 ml-5" style="color: #222">{{\Carbon\Carbon::now()->format('d/m/Y')}}</span></p>
                            <div class="main-banner po-relative mt-30">
                                <img src="{{asset('themes/doantat/lib/images/banner.png')}}" alt="" class="img-responsive center-block">
                                <div id="main-award" class="main-award d-flex justify-center align-center color-fff fw-900 fz-35 po-absolute po-b-60 po-l-0 w-100p lh-35">
                                    {{number_format($currentAward + $valueFromStartToNow)}}
                                </div>
                            </div>

                            <p class="text-center mt-75 mb-25 fw-700 fz-16">Click vào vé để đặt mua</p>

                            <form action="{{route('theme.buyticket.post')}}" method="post" class="ticket-wrapper d-flex justify-center align-center" id="form-buy-ticket">
                                {{csrf_field()}}
                                @for($i = 1; $i <= $limitTicket; $i++)
                                    <div class="ticket-item w-130 h-200 d-flex justify-center align-center pa-5 ml-5 mr-5" data-ticket-number="ticket-{{$i}}">
                                        <input type="hidden" id="ticket-{{$i}}" value="000" name="tickets[]" disabled>
                                        <img src="{{asset('themes/doantat/lib/images/logo-blank.png')}}" alt="" class="img-responsive">
                                        <div class="ticket-face-up-wrapper d-flex justify-center align-center">
                                            <p class="fz-10 fw-700">Nhập số bạn chọn</p>
                                            <div class="ticket-number-wrapper d-flex justify-center">
                                                <input type="number" max="9" min="0" value="0" class="w-32 h-58 ml-2 mr-2 text-center ticket-number-input fw-700 bg-color-fff" data-position="0" data-target="ticket-{{$i}}">
                                                <input type="number" max="9" min="0" value="0" class="w-32 h-58 ml-2 mr-2 text-center ticket-number-input fw-700 bg-color-fff" data-position="1" data-target="ticket-{{$i}}">
                                                <input type="number" max="9" min="0" value="0" class="w-32 h-58 ml-2 mr-2 text-center ticket-number-input fw-700 bg-color-fff" data-position="2" data-target="ticket-{{$i}}">
                                            </div>
                                            <p class="ticket-facedown mt-15">Bỏ vé</p>
                                        </div>
                                    </div>
                                @endfor

                                <button type="submit" class="site-button center-block mt-35">
                                    <span class="button-blue button-inner d-flex justify-center">Mua vé</span>
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

