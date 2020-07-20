<?php
/**
 * create.blade.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('wallet::wallet.sidebar.wallet.create'))

@section('content')

    <form action="{{route('alucms::wallet.create.post')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-8 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info py-3 text-white">
                        <div class="card-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpaseLeft" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        </div>
                        <h5 class="card-title mb-0 text-white">{{trans('wallet::wallet.sidebar.wallet.create')}}</h5>
                    </div>
                    <div id="cardCollpaseLeft" class="collapse show">
                        <div class="card-body">
                            <x-alucms-component-alert/>

                            <x-alucms-component-input
                                :title="trans('wallet::wallet.amount')"
                                name="amount"
                                status="required"
                                type="money"
                                :defaultValue="old('amount')"
                            />

                            <x-alucms-component-select
                                :title="trans('wallet::wallet.username')"
                                name="user_id"
                                :datavalue="$users->toArray()"
                                :defaultValue="old('username')"
                                field="username"
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
            </div>
        </div>
    </form>

@endsection
