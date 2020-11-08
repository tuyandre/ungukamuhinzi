<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>


    <!-- Page Title -->
    <title>@yield('title') | Ungukamuhinzi</title>

    <!-- Favicon and Touch Icons -->
    <link href="{{asset('/frontend/assets/logo.png')}}" rel="shortcut icon" type="image/png">

    <!-- Stylesheet -->
    <link rel='stylesheet' href='{{asset('frontend/dist/fontawesome/css/all.css')}}'>
    <link rel='stylesheet' href='{{asset('frontend/dist/fontawesome/css/v4-shims.css')}}'>
    <link rel='stylesheet' href='{{asset('frontend/dist/fontawesome/css/brands.css')}}'>
    <link rel='stylesheet' href='{{asset('frontend/dist/fontawesome/css/all.min.css')}}'>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset("frontend/css/bootstrap-grid.css")}}">
    <link rel="stylesheet" href="{{asset("frontend/css/bootstrap-grid.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("frontend/css/scrollbar.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("frontend/css/style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsevness.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("frontend/css/clientnavabar.css")}}">
    <script src="{{asset("frontend/js/jquery.js")}}"></script>
    <script src="{{asset("frontend/js/jquery.min.js")}}"></script>
    <script src="{{asset("frontend/js/bootstrap.min.js")}}"></script>
    @yield('css')
    <link rel='stylesheet' href='{{asset('frontend/dist/fontawesome/js/all.js')}}'>
    <link rel='stylesheet' href='{{asset('frontend/dist/fontawesome/js/all.min.js')}}'>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<![endif]-->
</head>
<body class="body scrollbar" id="style-15">
<div class="container">
@include('frontend.shared.header')

<!-- Start main-content -->
@yield('content')

<!-- Footer -->
</div>
@include('frontend.shared.footer')

<script src="{{asset('frontend//js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.placeholder.label.js')}}"></script>
<script src="{{asset('frontend/js/jquery.placeholder.label.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script>
    $(document).ready(function() {

    });
</script>
@yield('js')
</body>
</html>
