<?php
/**
 * alert.blade.php
 * Created by: trainheartnet
 * Created at: 7/7/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@if (session('message'))
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    {{session('message')}}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>@lang('dashboard::error.error')</strong>
    @foreach ($errors->all() as $e)
        <div>{{$e}}</div>
    @endforeach
</div>
@endif
