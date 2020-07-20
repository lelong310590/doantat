<?php
/**
 * input-component.blade.php
 * Created by: trainheartnet
 * Created at: 7/4/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@switch ($type)
    @case('password')
        <div class="form-group mb-3">
            <label for="{{$id}}">{{$title}}</label>
            <div class="input-group input-group-merge">
                <input type="{{$type}}" id="{{$id}}" class="form-control" name="{{$name}}" value="{{$defaultValue}}" {{$status}}>
                <div class="input-group-append" data-password="false">
                    <div class="input-group-text">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div>
        </div>
        @break

    @case('money')
        <div class="form-group mb-3">
            <label for="{{$id}}">{{$title}}</label>
            <input data-toggle="touchspin" type="{{$type}}" id="{{$id}}" name="{{$name}}" value="{{$defaultValue ? $defaultValue : 0}}" {{$status}} data-bts-prefix="$">
        </div>

        @push('css')
            <link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />
        @endpush

        @push('js')
            <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
        @endpush

        @break

    @default
        <div class="form-group mb-3">
            <label for="{{$id}}">{{$title}}</label>
            <input type="{{$type}}" id="{{$id}}" class="form-control" name="{{$name}}" value="{{$defaultValue}}" {{$status}}>
        </div>
@endswitch

