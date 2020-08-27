<?php
/**
 * upload.blade.php
 * Created by: trainheartnet
 * Created at: 7/16/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<div class="card">
    <div class="card-body">
        <div class="card-widgets">
            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
            <a data-toggle="collapse" href="#cardCollpaseUpload" role="button" aria-expanded="false" aria-controls="cardCollpaseUpload"><i class="mdi mdi-minus"></i></a>
        </div>
        <h5 class="card-title mb-0">{{$title}}</h5>

        <div id="cardCollpaseUpload" class="collapse pt-3 show">
            <!-- Center modal -->
            <a href="javascript:;" data-toggle="modal" data-target="#centermodal">
                @if ($defaultValue != '')
                    <img src="{{$defaultValue}}" alt="" class="img-fluid d-block mx-auto {{$id}}-preview">
                @else
                    <img src="https://via.placeholder.com/400x320png?text=image" alt="" class="img-fluid d-block mx-auto {{$id}}-preview">
                @endif
            </a>
            <input type="hidden" value="{{$defaultValue}}" id="{{$id}}" name="{{$name}}">

            <!-- Full width modal content -->
            <div id="centermodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="fullWidthModalLabel">@lang('dashboard::dashboard.form.media')</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="{{config('app.url')}}/filemanager/dialog.php?type={{$type}}&lang=vi&field_id={{$id}}&akey={{md5('AluCMSsflFWR9u2xQa')}}" frameborder="0" class="embed-responsive-item" height="500px"></iframe>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>


