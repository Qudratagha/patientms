<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}"/>


    <style>
        .table{
            font-size: 11px;
            border-top: 1px solid black;
        }
    </style>
    @yield('more-styles')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body data-sidebar="dark" data-sidebar-size="sm">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<!-- Start right Content here -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- container-fluid -->
        </div><!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Samply.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Pichforest
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- end main content-->
</div><!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center bg-dark p-3">

            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>
        <hr class="m-0" />
        <!-- Settings -->
        @include('layouts.settings')
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
{{--<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
<script src="{{asset('assets/libs/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

<!--Jquery Mask Plugin-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<!-- DataTables-->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>


@yield('custom_scripts')
<script>
    //alert remove after 8sec
    setTimeout(function () {
        $('.alert').remove();
    }, 5000);

</script>
</body>
</html>
