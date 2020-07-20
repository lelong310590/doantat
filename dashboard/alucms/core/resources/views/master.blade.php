<?php
/**
 * master.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
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

    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('css')
    @stack('css')

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />


    <link href="{{asset('assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .ck-editor__editable_inline {
            min-height: 500px !important;
        }
    </style>

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    @include('dashboard::partials.topbar')

    @include('dashboard::partials.sidebar')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">@lang('dashboard::dashboard.title')</a></li>
                                    <li class="breadcrumb-item active">@yield('pageTitle')</li>
                                </ol>
                            </div>
                            <h4 class="page-title">@yield('pageTitle')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @yield('content')

            </div>

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2015 - <script>document.write(new Date().getFullYear())</script> &copy; Alu Content Manager System by <a href="http://alusoft.vn">Alusoft</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>

<!-- Chat app -->
<script src="{{asset('assets/js/pages/jquery.chat.js')}}"></script>

<!-- Todo app -->
<script src="{{asset('assets/js/pages/jquery.todo.js')}}"></script>

<!-- Dashboard init JS -->
<script src="{{asset('assets/js/pages/dashboard-3.init.js')}}"></script>

<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>

<script src="{{asset('assets/libs/ckeditor5/build/ckeditor.js')}}"></script>

@yield('js')
@yield('js-init')
@stack('js')
@stack('js-init')

<!-- App js-->
<script src="{{asset('assets/js/app.min.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready((function ($) {
        $('[data-toggle="select2"]').select2({});

        $('[data-toggle="touchspin"]').TouchSpin({
            min: -1000000000,
            max: 1000000000,
            prefix: 'đ'
        });
    }))

    function responsive_filemanager_callback(field_id){
        console.log(field_id);
        var url = $('#'+field_id).val();
        var previewElem = $('.'+field_id + '-preview');
        previewElem.attr('src', url);
        console.log(previewElem);
        console.log(url);
        //your code
    }
</script>

</body>
</html>
