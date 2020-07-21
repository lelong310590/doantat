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
    trans('lottery::lottery.sidebar_ticket_index') : trans('lottery::lottery.sidebar_ticket_index_search').' "'.request()->get('keywords').'"'
)

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$ticket"
                :head="[
                    trans('dashboard::table.th_thumbnail'),
                    trans('dashboard::table.th_ticket_user'),
                    trans('dashboard::table.th_ticket_detail'),
                    trans('dashboard::table.th_ticket_date'),
                ]"
                :tablefield="[
                    ['thumbnail', 'relation', 'user', 'image'],
                    ['username', 'relation', 'user', 'text'],
                    ['value', 'relation', 'ticketDetail', 'ticket'],
                    'date'
                ]"
            />
        </div>
    </div>
@endsection
