<?php
/**
 * table.blade.php
 * Created by: trainheartnet
 * Created at: 7/7/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@if ($toolbar)
<div class="d-flex justify-content-between pt-2 pb-2">
    @if ($delete)
    <div class="col-md-4">
        <a href="" class="btn btn-danger waves-effect waves-light">
            <span class="btn-label"><i class="mdi mdi-delete-outline"></i></span>@lang('dashboard::dashboard.delete.checkbox')
        </a>
    </div>
    @endif

    @isset($filterSlot)
        {{$filterSlot}}
    @endisset

    @if ($search)
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
    @endif
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
            @if ($delete)
            <th width="50">
                <div class="checkbox checkbox-single">
                    <input type="checkbox" id="checkbox-all" value="" aria-label="">
                    <label></label>
                </div>
            </th>
            @endif

            @foreach ($head as $h)
                <th>{{$h}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach($tabledata as $k => $d)
                <tr>
                    @if ($delete)
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
                    @endif

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
                                            @elseif ($attributeType == 'ticket')
                                                @foreach($d->$relationName as $k => $t)
                                                    <button type="button" class="btn btn-outline-danger waves-effect waves-light">
                                                        {{$t->$attributeName}}
                                                    </button>
                                                @endforeach
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
                                            <span class="badge bg-soft-success text-success">{{$d ->$value}}</span>
                                        @elseif ($d->status == 'disable')
                                            <span class="badge bg-soft-danger text-danger">{{$d ->$value}}</span>
                                        @elseif ($d->status == 'wait')
                                            <span class="badge bg-soft-warning text-warning">Đang đợi</span>
                                        @elseif ($d->status == 'rejected')
                                            <span class="badge bg-soft-danger text-danger">Từ chối</span>
                                        @elseif ($d->status == 'processed')
                                            <span class="badge bg-soft-success text-success">Hoàn thành</span>
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
                    @if (!empty($action) && isset($action))

                        <td width="130" class="align-middle">
                            @foreach($action as $a)
                                <a href="{{route($a, $d->id)}}" class="action-icon">
                                    @if (isset($icon) && !empty($icon))
                                        @foreach($icon as $ic)
                                            {!! $ic !!}
                                        @endforeach
                                    @else
                                        @if ($loop->index == 0)
                                            <i class="mdi mdi-square-edit-outline"></i>
                                        @else
                                            <i class="mdi mdi-delete"></i>
                                        @endif
                                    @endif
                                </a>
                            @endforeach
                        </td>
                    @else
                        @isset($actionSlot)
                            {{$actionSlot}}
                        @endisset
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if (method_exists($tabledata, 'links'))
    {{$tabledata->appends(request()->query())->links('dashboard::pagination')}}
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
