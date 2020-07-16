<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('acl::acl.sidebar.permission.index'))

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$permission"
                :head="['Tiêu đề', 'Guard Name', 'Ngày khởi tạo', 'Ngày cập nhật']"
                :tablefield="['name', 'guard_name', 'created_at', 'updated_at']"
            />
        </div>
    </div>
@endsection
