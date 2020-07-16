<?php
/**
 * edit.blade.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('user::user.sidebar.user.edit'))

@section('content')
    <form action="{{route('alucms::user.edit.post', $user->id)}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-8 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info py-3 text-white">
                        <div class="card-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpaseLeft" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        </div>
                        <h5 class="card-title mb-0 text-white">{{trans('user::user.sidebar.user.edit')}}</h5>
                    </div>
                    <div id="cardCollpaseLeft" class="collapse show">
                        <div class="card-body">
                            <x-alucms-component-alert/>

                            <x-alucms-component-input
                                :title="trans('user::user.username')"
                                name="username"
                                status="required"
                                :defaultValue="$user->username"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.email')"
                                name="email"
                                status="readonly"
                                type="email"
                                :defaultValue="$user->email"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.password')"
                                name="password"
                                status=""
                                type="password"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.repassword')"
                                name="repassword"
                                status=""
                                type="password"
                            />

                            <x-alucms-component-select
                                :title="trans('user::user.role')"
                                name="role"
                                :datavalue="$role->toArray()"
                                :defaultValue="$user->roles[0]->id"
                                status="{{auth()->user()->id == $user->id ? 'disabled' : ''}}"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.full_name')"
                                name="full_name"
                                :defaultValue="$user->full_name"
                            />

                            <x-alucms-component-input
                                :title="trans('user::user.phone')"
                                name="phone"
                                :defaultValue="$user->phone"
                            />

                            <x-alucms-component-editor
                                :title="trans('user::user.description')"
                                name="description"
                                :defaultValue="$user->description"
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
                                :defaultValue="$user->status"
                                status="{{auth()->user()->id == $user->id ? 'disabled' : ''}}"
                            />

                            <x-alucms-component-button
                                :title="trans('dashboard::dashboard.form.buttonEdit')"
                            />
                        </div>
                    </div>
                </div>

                <x-alucms-component-upload
                    :title="trans('dashboard::dashboard.form.thumbnail')"
                    name="thumbnail"
                    type="1"
                    id="thumbnail"
                    :defaultValue="$user->thumbnail"
                />
            </div>
        </div>
    </form>

@endsection
