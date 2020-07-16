<?php
/**
 * index.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle',
    request()->get('keywords') == null ?
    trans('acl::acl.sidebar.role.index') : trans('acl::acl.sidebar.role.search').' "'.request()->get('keywords').'"'
)

@section('content')
    <div class="col-xs-12">

        <x-alucms-component-alert/>

        <div class="card">
            <x-alucms-component-table
                :tabledata="$role"
                :head="[
                    trans('dashboard::table.th_title'),
                    trans('dashboard::table.th_guard_name'),
                    trans('dashboard::table.th_created_at'),
                    trans('dashboard::table.th_updated_at'),
                    trans('dashboard::table.th_action')
                ]"
                :tablefield="['name', 'guard_name', 'created_at', 'updated_at']"
                :action="['alucms::role.edit.get', 'alucms::role.delete.get']"
            />
        </div>
    </div>
@endsection
