<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@yield('title') | Unguka|DashBoard</title>
    <link href="{{asset('/images/favicon.ico')}}" rel="shortcut icon">
    <link href="{{asset('/frontend/assets/logo.png')}}" rel="shortcut icon" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/all.min.css')}}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/frontend/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/responsevness.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/clientnavabar.css')}}">
    <link rel='stylesheet' href='https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css'>

    @yield('css')
    <style>

    </style>
</head>
<body class="scrollbar" id="style-15" >
@include('backend.farmer.shared.navbar')

@yield('content')

@include('backend.farmer.shared.footer')

<script src="{{asset('/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.placeholder.label.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.placeholder.label.min.js')}}"></script>
<script src="{{asset('/frontend/js/main.js')}}"></script>
<script src="{{asset('/backend/farmer/js/createFarm.js')}}"></script>
<script src="{{asset('/backend/farmer/js/retrievefarm.js')}}"></script>
<script src="{{asset('/backend/farmer/js/detaisof1farm.js')}}"></script>
<script src="{{asset('/backend/farmer/js/showExpenseOf1farm.js')}}"></script>
<script src="{{asset('/backend/farmer/js/seasons.js')}}"></script>
<script src="{{asset('/backend/farmer/js/CreateCrops.js')}}"></script>
<script src="{{asset('/backend/farmer/js/AllfarmWithexpenses.js')}}"></script>
<script src="{{asset('/backend/farmer/js/profile.js')}}"></script>
<script src="{{asset('/backend/farmer/js/ViewAllcrops.js')}}"></script>
<script src="{{asset('/backend/farmer/js/Addexpense.js')}}"></script>
<script src="{{asset('/backend/farmer/js/AddNewItemInStock.js')}}"></script>
<script src="{{asset('/backend/farmer/js/vSingleFarmer.js')}}"></script>
<script src="{{asset('/backend/farmer/js/Updatefarm.js')}}"></script>
{{--<script src="{{asset('/backend/farmer/js/feeds.js')}}"></script>--}}
<script src="{{asset('/backend/farmer/js/logout.js')}}"></script>
<script src="{{asset('/frontend/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.dataTables.js')}}"></script>
@yield('js')
</body>
</html>
