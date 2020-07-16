<?php
/**
 * create.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('acl::acl.sidebar.role.create'))

@section('content')

<form action="{{route('alucms::role.create.post')}}" method="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-8 col-xs-12">
            <div class="card">
                <div class="card-header bg-info py-3 text-white">
                    <div class="card-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpaseLeft" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h5 class="card-title mb-0 text-white">{{trans('acl::acl.sidebar.role.create')}}</h5>
                </div>
                <div id="cardCollpaseLeft" class="collapse show">
                    <div class="card-body">
                        <x-alucms-component-alert/>

                        <x-alucms-component-input
                            :title="trans('dashboard::dashboard.form.name')"
                            name="name"
                            status="required"
                            :defaultValue="old('name')"
                        />

                        <x-alucms-component-input
                            title="Guard Name"
                            name="guard_name"
                            status="readonly"
                            defaultValue="core"
                        />

                        <label for="">@lang('acl::acl.assign.role.to.permission')</label>
                        <x-alucms-component-table
                            :tabledata="$permissions"
                            :head="[
                                trans('dashboard::table.th_title'),
                                trans('dashboard::table.th_guard_name'),
                                trans('dashboard::table.th_created_at'),
                            ]"
                            :tablefield="['name', 'guard_name', 'created_at']"
                        />
                    </div>
                </div>
            </div>
        </div>

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
                        <x-alucms-component-button
                            :title="trans('dashboard::dashboard.form.buttonCreate')"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
