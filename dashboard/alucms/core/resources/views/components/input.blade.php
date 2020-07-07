<?php
/**
 * input-component.blade.php
 * Created by: trainheartnet
 * Created at: 7/4/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<div class="form-group mb-3">
    <label for="{{$id}}">{{$title}}</label>
    <input type="text" id="{{$id}}" class="form-control" name="{{$name}}" value="{{$defaultValue}}" {{$status}}>
</div>
