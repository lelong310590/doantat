<?php
/**
 * select.blade.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<div class="form-group mb-3">
    <label for="{{$id}}">{{$title}}</label>
    <select class="form-control " data-toggle="select2" id="{{$id}}" name="{{$name}}" {{$status}}>
        @foreach($datavalue as $d)
            <option value="{{$d['id']}}" {{$d['id'] == $defaultValue ? 'checked' : ''}}>{{$d['name']}}</option>
        @endforeach
    </select>
</div>
