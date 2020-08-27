<?php
/**
 * master.blade.php
 * Created by: trainheartnet
 * Created at: 7/24/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('pageTitle') | AluCMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="@lang('auth::auth.title') | AluCMS" name="description" />
    <meta content="Alusoft JSC" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    @stack('css')

    <!-- App css -->
    <link href="{{asset('themes/doantat/lib/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('themes/doantat/lib/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="{{asset('themes/doantat/lib/css/style.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />

</head>

<body {{Route::currentRouteName() != 'theme::home.get' ? 'class=bg-primary' : ''}}>

    @include('theme::partials.header')

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('themes/doantat/lib/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    @stack('js')

    <script src="{{asset('themes/doantat/lib/js/main.min.js')}}"></script>
</body>
</html>

