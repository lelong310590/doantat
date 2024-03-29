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
    <input type="hidden" id="price_per_ticket" value="{{config('core.price_per_ticket')}}">
    <div class="container">
        <div class="user-wrapper pt-50 pb-50">
            <div class="col-xs-12 col-md-3">
                @include('theme::partials.user_sidebar')
            </div>

            <div class="col-xs-12 col-md-9">
                <div class="dialog-wrapper color-fff pa-3">
                    <div class="dialog-wrapper-inner pa-40">
                        <div class="userinfo color-fff">
                            <div class="d-flex align-center justify-space">
                                <p>Kỳ quay thưởng: <span class="fz-14 lh-14 bg-color-fff pl-3 pr-3 pt-5 pb-5 ml-5" style="color: #222">{{\Carbon\Carbon::now()->format('d/m/Y')}}</span></p>
                                <p>Số vé hôm nay bạn có thể mua: {{$limitTicket}}</p>
                            </div>

                            <div class="main-banner po-relative mt-30">
                                <img src="{{asset('themes/doantat/lib/images/banner.png')}}" alt="" class="img-responsive center-block">
                                <div id="main-award" class="main-award d-flex justify-center align-center color-fff fw-900 fz-35 po-absolute po-b-60 po-l-0 w-100p lh-35 m-fz-21 m-po-b-21">
                                    {{number_format($currentAward + $valueFromStartToNow)}}
                                </div>
                            </div>

                            @if ($checkAllowTime)
                                @if ($limitTicket > 0)
                                    <p class="text-center mt-75 mb-25 fw-700 fz-16">Click vào vé để đặt mua</p>

                                    <form action="{{route('theme.buyticket.post')}}" method="post" class="ticket-wrapper d-flex justify-center align-center" id="form-buy-ticket">
                                        {{csrf_field()}}
                                        <input type="hidden" name="limitTicket" value="{{$limitTicket}}">
                                        <input type="hidden" name="game_type" value="ga3so">
                                        @for($i = 1; $i <= $limitTicket; $i++)
                                            <div class="ticket-item w-130 h-200 d-flex justify-center align-center pa-5 ml-5 mr-5" data-ticket-number="ticket-{{$i}}">
                                                <input type="hidden" id="ticket-{{$i}}" class="tickets-value" value="000" name="tickets[]" disabled>
                                                <img src="{{asset('themes/doantat/lib/images/logo-blank.png')}}" alt="" class="img-responsive">
                                                <div class="ticket-face-up-wrapper d-flex justify-center align-center">
                                                    <p class="fz-10 fw-700">Nhập số bạn chọn</p>
                                                    <div class="ticket-number-wrapper d-flex justify-center">
                                                        <input type="text" maxlength="1" value="0" pattern="[0-9]+" class="w-32 h-58 ml-2 mr-2 text-center ticket-number-input fw-700 bg-color-fff" data-position="0" data-target="ticket-{{$i}}">
                                                        <input type="text" maxlength="1" value="0" pattern="[0-9]+" class="w-32 h-58 ml-2 mr-2 text-center ticket-number-input fw-700 bg-color-fff" data-position="1" data-target="ticket-{{$i}}">
                                                        <input type="text" maxlength="1" value="0" pattern="[0-9]+" class="w-32 h-58 ml-2 mr-2 text-center ticket-number-input fw-700 bg-color-fff" data-position="2" data-target="ticket-{{$i}}">
                                                    </div>
                                                    <p class="ticket-facedown mt-15">Bỏ vé</p>
                                                </div>
                                            </div>
                                        @endfor

                                        <div class="submit-wrapper w-100p">
                                            <button type="submit" class="site-button center-block mt-35">
                                                <span class="button-blue button-inner d-flex justify-center">Mua vé</span>
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <p class="text-center mt-75 mb-25 fw-700 fz-16">Bạn đã mua đủ số lượng vé cho kỳ quay thưởng này !</p>
                                    <div class="submit-wrapper d-flex">
                                        <a href="{{route('theme.history.get')}}" class="site-button center-block mt-35">
                                            <span class="button-blue button-inner d-flex justify-center">Xem lịch sử</span>
                                        </a>
                                    </div>
                                @endif
                            @else
                                <p class="text-center mt-75 mb-25 fw-700 fz-16">Đã hết giờ mua vé</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="popup-backdrop po-fixed po-t-0 po-b-0 po-r-0 po-l-0 d-flex justify-center align-center z-1">

    <div class="popup-content po-relative" id="buy-ticket-popup">

        <div class="popup-content-close po-absolute po-t--18 po-r--18">
            <a href="javascript:;"><i class="fas fa-times"></i></a>
        </div>

        <div class="popup-content-inner color-fff">

        </div>
    </div>

    <div class="popup-content po-relative" id="buy-ticket-result">

        <div class="popup-content-close po-absolute po-t--18 po-r--18">
            <a href="javascript:;"><i class="fas fa-times"></i></a>
        </div>

        <div class="popup-content-inner color-fff">
            <p class="text-center fw-700">Bộ vé số mà bạn chọn mua là:</p>
            <div class="ticket-wrapper d-flex justify-center align-center mt-30">

            </div>
            <div class="d-flex justify-center align-center fw-700 mt-25">
                <p class="mb-0">Chi phí mua bộ vé: <span id="total-price"></span></p>
                <img src="{{asset('themes/doantat/lib/images/coin.png')}}" class="img-responsive w-20 h-20 ml-3"/>
            </div>
            <div class="submit-wrapper w-100p d-flex justify-center align-center">
                <button type="button" class="site-button center-block mt-35" id="confirm-buy-ticket">
                    <span class="button-blue button-inner d-flex justify-center">Đồng ý</span>
                </button>

                <button type="button" class="site-button center-block mt-35" id="reject-buy-ticket">
                    <span class="button-red button-inner d-flex justify-center">Chọn lại</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

