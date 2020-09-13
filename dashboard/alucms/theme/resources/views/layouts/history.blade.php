<?php
/**
 * history.blade.php
 * Created by: trainheartnet
 * Created at: 9/13/20
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
                        <div class="history-filter-bar d-flex align-center">
                            <div class="mr-15">Chọn ngày: </div>
                            <form action="" class="d-flex align-center" autocomplete="off">
                                <div class="input-group date datepicker" data-provide="datepicker">
                                    <input type="text" class="form-control" name="date" value="">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                <div class="history-filter-submit">
                                    <button type="submit" class="h-40 ml-10 pl-15 pr-15 d-flex justify-center align-center">
                                        <img src="{{asset('themes/doantat/lib/images/search.png')}}" alt="" class="img-responsive w-18 h-18"> <span class="fw-700 ml-10">Tìm kiếm</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="history-table mt-50">
                            <div class="ticket-wrapper d-flex justify-center align-center mt-30">
                                @if ($ticket != null)
                                    <p class="w-100p mb-30">Bộ vé bạn đã mua ngày: {{request()->get('date') != null ? request()->get('date') : \Carbon\Carbon::now()->format('d/m/Y')}}</p>
                                    @foreach($ticket->ticketDetail as $t)
                                    <div class="ticket-item dir-column ticket-item-result w-130 h-200 d-flex justify-center align-center pa-5 ml-5 mr-5">
                                        <img src="{{asset('themes/doantat/lib/images/logo-blank.png')}}" alt="" class="img-responsive">
                                        <div class="ticket-number-wrapper d-flex justify-center mt-20">
                                            <span>{{$t->value}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="d-flex justify-center align-center dir-column">
                                        <img src="{{asset('themes/doantat/lib/images/no-money.png')}}" alt="" class="img-responsive w-150 h-150 mb-30">
                                        <p class="fw-700">Bạn chưa mua vé nào ?</p>
                                        <a href="{{route('theme.buyticket.get')}}" class="site-button center-block mt-35" id="reject-buy-ticket">
                                            <span class="button-red button-inner d-flex justify-center">Mua vé</span>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="result fw-700 mt-30">
                                Kết quả cho kỳ quay này là : <span class="fz-20">{{isset($bingo->result_value) ? $bingo->result_value : ''}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('themes/doantat/lib/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css')}}">
@endpush

@push('js')
    <script type="text/javascript" src="{{asset('themes/doantat/lib/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('themes/doantat/lib/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.vi.min.js')}}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('.datepicker').datepicker({
                language: "vi",
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
@endpush
