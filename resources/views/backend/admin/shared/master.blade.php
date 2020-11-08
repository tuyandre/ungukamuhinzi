<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Ethical Research Solution">
    <meta name="description" content="Ethical Research Solution">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title') | Unguka|DashBoard</title>
    <!-- Favicon icon -->
    <!-- Favicon and Touch Icons -->
    <link href="{{asset('/images/favicon.ico')}}" rel="shortcut icon">
    <link href="{{asset('/frontend/assets/logo.png')}}" rel="shortcut icon" type="image/png">

    <link href="{{asset('/backend/admin/dashboard/dist/css/style.min.css')}}" rel="stylesheet">

    @yield('css')

    <![endif]-->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
{{--<div class="wrapper" id="app">--}}
<div id="main-wrapper">
    @include('backend.admin.shared.navbar')
    @include('backend.admin.shared.sidebar')
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-12 justify-content-start d-flex align-items-center">
                    <h5 class="font-medium text-uppercase mb-0">Dashboard</h5>
                </div>
                <div class="col-lg-9 col-md-8 col-xs-12 d-flex justify-content-start justify-content-md-end align-self-center">
                    <nav aria-label="breadcrumb" class="mt-2">
                        <ol class="breadcrumb mb-0 justify-content-end p-0 bg-white">
                            <li class="breadcrumb-item"><a href="/Administration">Home</a></li>
                            {{--<li class="breadcrumb-item active" aria-current="page">Dashboard</li>--}}
                            <li class="breadcrumb-item active" aria-current="page">@yield('items')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="page-content container-fluid">
            @yield('content')

        </div>
        @include('backend.admin.shared.footer')
    </div>
    {{--</div>--}}
</div>

<div class="chat-windows"></div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
{{--<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>--}}
<script src="{{asset('/backend/admin/dashboard/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('/backend/admin/dashboard/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('/backend/admin/dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<script src="{{asset('/backend/admin/dashboard/dist/js/app.min.js')}}"></script>
<script src="{{asset('/backend/admin/dashboard/dist/js/app.init.material.js')}}"></script>
<script src="{{asset('/backend/admin/dashboard/dist/js/app-style-switcher.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('/backend/admin/dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('/backend/admin/dashboard/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('/backend/admin/dashboard/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('/backend/admin/dashboard/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('/backend/admin/dashboard/dist/js/custom.min.js')}}"></script>
<script src="{{ asset('/parsleyjs/js/parsley.min.js') }}" ></script>
<script src="{{ asset('/js/bootbox.min.js') }}" ></script>

@yield('js')

</body>
</html>
