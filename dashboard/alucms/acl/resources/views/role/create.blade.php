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
                        <x-alucms-form-input
                            :title="trans('dashboard::dashboard.form.name')"
                            name="name"
                            status="required"
                        />

                        <x-alucms-form-input
                            title="Guard Name"
                            name="guard_name"
                            status="readonly"
                            defaultValue="web"
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
                        <x-alucms-form-button
                            :title="trans('dashboard::dashboard.form.buttonCreate')"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

