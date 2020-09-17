<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 9/11/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@php
    $title = request()->get('type') == 'cash_in' ? 'Yêu cầu nạp tiền' : 'Yêu cầu rút tiền'
@endphp

@section('pageTitle',
    request()->get('keywords') == null ?
    $title : $title.' với tài khoản "'.request()->get('keywords').'"'
)

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$notification"
                :head="[
                    trans('dashboard::table.th_username'),
                    trans('dashboard::table.th_amount'),
                    trans('dashboard::table.th_status'),
                    trans('dashboard::table.th_created_at'),
                    trans('dashboard::table.th_updated_at'),
                    trans('dashboard::table.th_action'),
                ]"
                :tablefield="[
                    ['username', 'relation', 'user', 'text'],
                    ['amount', 'money', 'đ'],
                    ['status', 'label'],
                    'created_at',
                    'updated_at'
                ]"
                :action="['alucms::notification.edit.get']"
                :icon="['<i class=fe-eye></i>']"
                :delete=false
            />
        </div>
    </div>
@endsection
