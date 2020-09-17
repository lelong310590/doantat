<?php
/**
 * edit.blade.php
 * Created by: trainheartnet
 * Created at: 9/11/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', $notification->type == 'cash_in' ? 'Yêu cầu nạp tiền' : 'Yêu cầu rút tiền')

@section('content')

    <form action="{{route('alucms::notification.edit.post', $notification->id)}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-8 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info py-3 text-white">
                        <div class="card-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpaseLeft" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        </div>
                        <h5 class="card-title mb-0 text-white">Yêu cầu {{$notification->type == 'cash_in' ? 'nạp tiền' : 'rút tiền'}}</h5>
                        <input type="hidden" name="type" value="{{$notification->type}}">
                    </div>
                    <div id="cardCollpaseLeft" class="collapse show">
                        <div class="card-body">
                            <x-alucms-component-alert/>

                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Reported by -->
                                    <label class="mt-2 mb-1">Tài khoản yêu cầu :</label>
                                    <div class="media">
                                        @php
                                            $thumbnail = ($notification->user->thumbnail != null) ? $notification->user->thumbnail : 'https://via.placeholder.com/100x100?text=image';
                                        @endphp
                                        <img src="{{$thumbnail}}" alt="{{$notification->user->username}}" class="rounded-circle mr-2" height="24">
                                        <div class="media-body">
                                            <p> {{$notification->user->username}} </p>
                                        </div>
                                    </div>
                                    <!-- end Reported by -->
                                </div> <!-- end col -->

                                <div class="col-md-3">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Số tiền :</label>
                                    <p>{{number_format($notification->amount)}} đ</p>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-md-3">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Loại yêu cầu :</label>
                                    <p>{{$notification->type == 'cash_in' ? 'Nạp tiền' : 'Rút tiền'}}</p>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-md-3">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Ngày gửi yêu cầu :</label>
                                    <p>{{$notification->created_at}}</p>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                            </div>

                            @if ($notification->status != 'wait')
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- assignee -->
                                    <label class="mt-2 mb-1">Ngày xử lý :</label>
                                    <p>{{$notification->updated_at}}</p>
                                    <!-- end assignee -->
                                </div> <!-- end col -->
                            </div>
                            @endif

                            <label class="mt-2 mb-1">Nội dung :</label>
                            <p class="text-muted mb-4">
                                {!! $notification->content !!}
                            </p>

                            @if ($notification->status == 'rejected')
                                <p class="text-danger">
                                    Yêu cầu này đã bị từ chối
                                </p>
                            @elseif ($notification->status == 'processed')
                                <p class="text-success">
                                    Yêu cầu này đã được phê duyệt
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if ($notification->status == 'wait')
            <div class="col-4 col-xs-12">
                <div class="card">
                    <div class="card-header bg-danger py-3 text-white">
                        <div class="card-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpaseRight" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        </div>
                        <h5 class="card-title mb-0 text-white">{{trans('dashboard::dashboard.form.actionTitle')}}</h5>
                    </div>
                    <div id="cardCollpaseRight" class="collapse show">
                        <div class="card-body">

                            <input type="hidden" value="{{$notification->amount}}" name="amount">
                            <input type="hidden" value="{{$notification->user_id}}" name="user_id">

                            <x-alucms-component-select
                                :title="trans('notification::notification.notification_cash_in_action')"
                                name="status"
                                :datavalue="[
                                    ['id' => 'wait', 'name' => trans('notification::notification.notification_cash_in_status_wait')],
                                    ['id' => 'rejected', 'name' => trans('notification::notification.notification_cash_in_status_reject')],
                                    ['id' => 'processed', 'name' => trans('notification::notification.notification_cash_in_status_accept')]
                                ]"
                                :defaultValue="$notification->status"
                            />

                            <x-alucms-component-button
                                :title="trans('notification::notification.notification_cash_in_action')"
                            />
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </form>

@endsection
