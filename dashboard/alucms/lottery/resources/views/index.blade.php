<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 7/17/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('lottery::lottery.sidebar_lottery_index'))

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$result"
                :head="['Ngày', 'Kết quả']"
                :tablefield="['result_date', 'result_value']"
            />
        </div>
    </div>
@endsection
