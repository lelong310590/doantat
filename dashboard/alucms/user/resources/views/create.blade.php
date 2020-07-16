<?php
/**
 * create.blade.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('user::user.sidebar.user.create'))

@section('content')

    <form action="{{route('alucms::user.create.post')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-8 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info py-3 text-white">
                        <div class="card-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpaseLeft" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        </div>
                        <h5 class="card-title mb-0 text-white">{{trans('user::user.sidebar.user.create')}}</h5>
                    </div>
                    <div id="cardCollpaseLeft" class="collapse show">
                        <div class="card-body">
                            <x-alucms-component-alert/>

                            <x-alucms-component-input
                                :title="trans('user::user.username')"
                                name="username"
                                status="required"
                                :defaultValue="old('username')"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.email')"
                                name="email"
                                status="required"
                                type="email"
                                :defaultValue="old('email')"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.password')"
                                name="password"
                                status="required"
                                type="password"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.repassword')"
                                name="repassword"
                                status="required"
                                type="password"
                            />

                            <x-alucms-component-select
                                :title="trans('user::user.role')"
                                name="role"
                                :datavalue="$role->toArray()"
                                :defaultValue="old('role')"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.full_name')"
                                name="full_name"
                                :defaultValue="old('full_name')"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.phone')"
                                name="phone"
                                :defaultValue="old('phone')"
                            />

                            <x-alucms-component-editor
                                :title="trans('user::user.description')"
                                name="description"
                                :defaultValue="old('description')"
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

                            <x-alucms-component-select
                                :title="trans('dashboard::dashboard.form.status')"
                                name="status"
                                :datavalue="[
                                    ['id' => 'active', 'name' => trans('dashboard::dashboard.form.status.active')],
                                    ['id' => 'disable', 'name' => trans('dashboard::dashboard.form.status.disable')]
                                ]"
                            />

                            <x-alucms-component-button
                                :title="trans('dashboard::dashboard.form.buttonCreate')"
                            />
                        </div>
                    </div>
                </div>

                <x-alucms-component-upload
                    :title="trans('dashboard::dashboard.form.thumbnail')"
                    name="thumbnail"
                    type="1"
                    id="thumbnail"
                />
            </div>
        </div>
    </form>

@endsection
