<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | Unguka|DashBoard</title>
    <link href="{{asset('/images/favicon.ico')}}" rel="shortcut icon">
    <link href="{{asset('/frontend/assets/logo.png')}}" rel="shortcut icon" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="{{asset('/frontend/farmercss/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/farmercss/css/all.min.css')}}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('/frontend/farmercss/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/farmercss/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/farmercss/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/farmercss/css/responsevness.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/clientnavabar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/farmercss/css/scrollbar.css')}}">
    <script src="{{asset('/frontend/farmercss/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="{{asset('/frontend/farmercss/js/bootstrap.min.js')}}"></script>
    <link rel='stylesheet' href='https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css'>


    @yield('css')
    <style>

    </style>
</head>
<body class="body scrollbar" id="style-15">
<div class="container">

@include('backend.client.shared.header')

@yield('content')
</div>
@include('backend.client.shared.footer')



<!-- </div> -->
<script src="{{asset('/frontend/farmercss/js/jquery.min.js')}}"></script>
<script src="{{asset('/frontend/farmercss/js/jquery.placeholder.label.js')}}"></script>
<script src="{{asset('/frontend/farmercss/js/jquery.placeholder.label.min.js')}}"></script>
<script src="{{asset('/frontend/farmercss/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src="{{asset('/frontend/js/main.js')}}"></script>
<script src="{{asset('/frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('/backend/customer/js/homeJs/havers.js')}}"></script>
<script src="{{asset('/backend/customer/js/orderJS/makeorder.js')}}"></script>
<script src="{{asset('/backend/customer/js/homeJs/displayoneharvest.js')}}"></script>
<script src="{{asset('/backend/customer/js/profile.js/clientdetails.js')}}"></script>
{{--<script src="js/logout.js"></script>--}}
<!-- <script src="js/profile.js/clientdetails.js"></script> -->
<script>
    $(document).ready(function() {

    });
</script>

@yield('js')
</body>
</html>

