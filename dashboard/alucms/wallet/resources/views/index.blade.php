<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle',
    request()->get('keywords') == null ?
    trans('wallet::wallet.sidebar.wallet.index') : trans('wallet::wallet.sidebar.wallet.index.search').' "'.request()->get('keywords').'"'
)

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$wallet"
                :head="[
                    trans('dashboard::table.th_thumbnail'),
                    trans('dashboard::table.th_wallet_user'),
                    trans('dashboard::table.th_amount'),
                    trans('dashboard::table.th_status'),
                    trans('dashboard::table.th_created_at'),
                    trans('dashboard::table.th_updated_at'),
                    trans('dashboard::table.th_action'),
                ]"
                :tablefield="[
                    ['thumbnail', 'relation', 'user', 'image'],
                    ['username', 'relation', 'user', 'text'],
                    ['amount', 'money', 'đ'], ['status', 'label'], 'created_at', 'updated_at'
                ]"
                :action="['alucms::wallet.edit.get']"
            />
        </div>
    </div>
@endsection
