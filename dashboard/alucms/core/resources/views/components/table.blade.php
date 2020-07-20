<?php
/**
 * table.blade.php
 * Created by: trainheartnet
 * Created at: 7/7/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@if (!empty($action))
<div class="d-flex justify-content-between pt-2 pb-2">
    <div class="col-md-4">
        <a href="" class="btn btn-danger waves-effect waves-light">
            <span class="btn-label"><i class="mdi mdi-delete-outline"></i></span>@lang('dashboard::dashboard.delete.checkbox')
        </a>
    </div>
    <form class="col-md-4" action="" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="@lang('dashboard::dashboard.search.placeholder')" name="keywords" value="{{request()->get('keywords')}}">
            <div class="input-group-append">
                <button class="btn btn-dark waves-effect waves-light" type="submit">
                    @lang('dashboard::dashboard.search')
                </button>
            </div>
        </div>
    </form>
</div>
@endif

<div class="table-responsive">
    @if ($type == 'dark')
    <table class="table table-dark mb-0">
    @else
    <table class="table table-striped mb-0">
    @endif
        @if ($type == 'dark')
        <thead>
        @else
        <thead class="thead-dark">
        @endif
        <tr>
            <th width="50">
                <div class="checkbox checkbox-single">
                    <input type="checkbox" id="checkbox-all" value="" aria-label="">
                    <label></label>
                </div>
            </th>
            @foreach ($head as $h)
                <th>{{$h}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach($tabledata as $k => $d)
                <tr>
                    <th scope="row" width="50" class="align-middle">
                        <div class="checkbox checkbox-single">
                            <input
                                type="checkbox"
                                name="listItems[]"
                                value="{{$d->id}}"
                                aria-label=""
                                class="checkbox-item"
                                {{in_array($d->id, $relations) ? 'checked' : '' }}
                            >
                            <label></label>
                        </div>
                    </th>
                    @foreach($tablefield as $t => $f)
                        @if (is_array($f))
                            @php
                                $value = $f[0]
                            @endphp
                            @switch($f[1])
                                @case('image')
                                    <td class="align-middle">
                                        @php
                                            $thumbnail = ($d->$value != null) ? $d->$value : 'https://via.placeholder.com/100x100?text=image';
                                        @endphp
                                        <img src="{{$thumbnail}}" alt="" class="img-fluid avatar-md rounded">
                                    </td>
                                    @break
                                @case('relation')
                                    @php
                                        $relationName = $f[2];
                                        $attributeName = $f[0];
                                        $attributeType = $f[3];
                                    @endphp
                                        <td class="align-middle">
                                            @if ($attributeType == 'image')
                                                @php
                                                    $thumbnail = ($d->$relationName->$attributeName != null) ? $d->$relationName->$attributeName : 'https://via.placeholder.com/100x100?text=image';
                                                @endphp
                                                <img src="{{$thumbnail}}" alt="" class="img-fluid avatar-md rounded">
                                            @else
                                                {{$d->$relationName->$attributeName}}
                                            @endif
                                        </td>
                                    @break
                                @case('money')
                                    @php
                                        $sign = $f[2];
                                    @endphp
                                    <td class="align-middle">{{number_format($d->$value)}} {{$sign}}</td>
                                    @break
                                @case('label')
                                    <td class="align-middle">
                                        @if ($d->status == 'active')
                                            <span class="badge badge-success">{{$d ->$value}}</span>
                                        @elseif ($d->status == 'disable')
                                            <span class="badge badge-danger">{{$d ->$value}}</span>
                                        @endif
                                    </td>
                                    @break
                                @case('array')
                                    @php
                                        $arrayItem = $d->$value
                                    @endphp
                                    <td class="align-middle">
                                        @foreach($arrayItem as $subValue)
                                            <span class="badge badge-primary">{{$subValue->name}}</span>
                                        @endforeach
                                    </td>
                                    @break
                                @default
                                    <td class="align-middle">{{$d ->$value}}</td>
                            @endswitch
                        @else
                            <td class="align-middle">{{$d->$f}}</td>
                        @endif
                    @endforeach
                    @if (!empty($action))
                        <td width="130" class="align-middle">
                            <a href="{{route($action[0], $d->id)}}" class="tabledit-edit-button btn btn-success">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            @isset($action[1])
                            <a href="{{route($action[1], $d->id)}}" class="tabledit-edit-button btn btn-danger">
                                <i class="mdi mdi-delete-forever-outline"></i>
                            </a>
                            @endisset
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if (method_exists($tabledata, 'links'))
    {{$tabledata->links('dashboard::pagination')}}
@endif

@push('js')
    <script type="text/javascript">
        jQuery(document).ready((function ($) {
            $('body').on('change', '#checkbox-all', function (e) {
                $('input.checkbox-item').not(this).prop('checked', this.checked);
            })
        }));
    </script>
@endpush
