@extends('theme::master')

@section('content')
    <main class="main" id="main">
        <div class="lode-slider po-relative bg-cover bg-center" style="background-image: url({{asset('themes/doantat/lib/images/bg-new-main-1.png')}})">
            <img src="{{asset('themes/doantat/lib/images/obj-ball.png')}}" alt="" class="img-responsive">
        </div>

        <div class="container">
            <div id="lode-elem"></div>
        </div>
    </main>
@endsection

@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
