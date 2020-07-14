<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('acl::acl.sidebar.role.index'))

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$role"
                :head="['Tiêu đề', 'Guard Name', 'Ngày khởi tạo', 'Ngày cập nhật', 'Thao tác']"
                :tablefield="['name', 'guard_name', 'created_at', 'updated_at']"
                :action="['alucms::role.edit.get', 'alucms::role.delete.get']"
            />
        </div>
    </div>
@endsection
