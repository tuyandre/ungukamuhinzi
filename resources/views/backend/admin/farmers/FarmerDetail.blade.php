@extends('backend.admin.shared.master')

@section('title','Unguka|Farmer')
@section('css')
    <link href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/admin/dashboard/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/admin/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    {{--    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">--}}
    <link r type="text/css"
          href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('items','Farmer Detail ')
@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-xlg-2 col-md-3">
            <div class="card">
                <div class="card-body">
{{--                    <p>{{$farmer}}</p>--}}
                    <center class="mt-4 bg-secondary">
                        <?php
                        $photo=$farmer->photo;

                        ?>
                        @if(empty($photo))
                            <img src="{{ asset('/backend/profiles/default.jpg')}}" class="rounded-circle" width="150" height="150" />
                        @else
                            <img src="{{ asset('backend/profiles/'.$photo)}}" class="rounded-circle" width="150" height="150" />

                        @endif
                        {{--                        <h2 class="card-title mt-2">{{ $brand->name }}</h2>--}}

                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-footer">
                    <center class="mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="card-title mt-2">{{ $farmer->fname }} {{ $farmer->lname }}</h2>
                            </div>

                        </div>


                    </center>
                </div>
                <div class="card-footer"> <small class="text-muted pt-4 db">Identity </small>
                    <h6>{{ $farmer->identity }}</h6>
                    <small class="text-muted pt-4 db">Phone</small>
                    <h6>{{ $farmer->phone }}</h6>

                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-9 col-xlg-10 col-md-9">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                    <li class="nav-item" style="display: flex !important;">
                        <a class="nav-link active bg-primary" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false" style="margin-right: 40px !important;">
                            {{$farmer->fname}} 's Farms</a>
                        <a class="nav-link  bg-success"  href="#"  aria-controls="pills-setting" aria-selected="false" style="color: white !important;">
                            {{$farmer->fname}} 's Expense</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active bg-secondary" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="card material-card">
                                        <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                                            {{$farmer->fname}} 's Farms

                                        </h5>

                                        <div class="p-3">

                                            <div class="table-responsive">
                                                <table id="priceTable" class="table table-striped table-bordered "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>UPI</th>
                                                        <th>Plot Sze </th>
                                                        <th>Location</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

@endsection
@section('js')
    <script>

    </script>



    <script src="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/admin/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/admin/dashboard/js/dataTables.min.js')}}"></script>
@endsection
