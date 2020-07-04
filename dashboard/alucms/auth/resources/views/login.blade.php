<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@lang('auth::auth.title') | AluCMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="@lang('auth::auth.title') | AluCMS" name="description" />
    <meta content="Alusoft JSC" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="index.html">
                                <span><img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="22"></span>
                            </a>
                            <p class="text-muted mb-4 mt-3">@lang('auth::auth.text')</p>
                        </div>

                        <form action="{{route('auth::login.post')}}" method="post">

                            {{csrf_field()}}

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>@lang('dashboard::dashboard.error')</strong>
                                    @foreach ($errors->all() as $e)
                                        <div>{{$e}}</div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label for="username">@lang('auth::auth.username')</label>
                                <input class="form-control" type="text" id="username" required="" name="username" placeholder="@lang('auth::auth.username_placeholder')">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">@lang('auth::auth.password')</label>
                                <input class="form-control" type="password" required="" name="password" id="password" placeholder="@lang('auth::auth.password_placeholder')">
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">@lang('auth::auth.remember')</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> @lang('auth::auth.button') </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="pages-recoverpw.html" class="text-white-50 ml-1">@lang('auth::auth.forgot_password')</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<footer class="footer footer-alt">
    2018 - {{\Carbon\Carbon::now()->year}} &copy; Phát triển bởi <a href="" class="text-white-50">Alusoft</a>
</footer>

<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

</body>
</html>
