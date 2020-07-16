<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle',
    request()->get('keywords') == null ?
    trans('user::user.sidebar.user.index') : trans('user::user.sidebar.user.index.search').' "'.request()->get('keywords').'"'
)

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$user"
                :head="[
                    trans('dashboard::table.th_thumbnail'),
                    trans('dashboard::table.th_username'),
                    trans('dashboard::table.th_email'),
                    trans('dashboard::table.th_status'),
                    trans('dashboard::table.th_role'),
                    trans('dashboard::table.th_created_at'),
                    trans('dashboard::table.th_updated_at'),
                    trans('dashboard::table.th_action'),
                ]"
                :tablefield="[
                    ['thumbnail', 'image'], 'username', 'email', ['status', 'label'], ['roles', 'array'], 'created_at', 'updated_at'
                ]"
                :action="['alucms::user.edit.get', 'alucms::user.delete.get']"
            />
        </div>
    </div>
@endsection
