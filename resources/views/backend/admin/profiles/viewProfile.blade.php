@extends('backend.admin.shared.master')

@section('title','Full Profile')
@section('css')
    <link href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Profile ')
@section('content')



    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4">
                        <?php
                        $photo=Auth::user()->profile_photo_path;

                        ?>
                        @if(empty($photo))
                        <img src="{{ asset('backend/assets/users/default.jpg')}}" class="rounded-circle" width="150" />
                            @else
                                <img src="{{ asset('backend/assets/users/profiles/'.$photo)}}" class="rounded-circle" width="150" />

                            @endif
                                <h4 class="card-title mt-2">{{ Auth::user()->email }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->fullname }} </h6>
                        <div class="row text-center justify-content-md-center">
{{--                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>--}}
{{--                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>--}}
                        </div>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6><a href="{{ Auth::user()->email }}" class="__cf_email__" data-cfemail="1f777e71717e7870697a6d5f78727e7673317c7072">{{ Auth::user()->email }}</a></h6>
                    <small class="text-muted pt-4 db">Phone</small>
                    <h6>{{ Auth::user()->phone }}</h6>

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                   <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material" id="infoForm" method="post" action="{{ route('admin.updateInfo') }}">
                                @csrf
                                <div id="add-messages"></div>
                                <div class="row">
                                <div class="form-group col-12">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Full Name" name="fullname" value="{{ Auth::user()->fullname }}" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-6">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Email" class="form-control form-control-line" value="{{ Auth::user()->email }}" name="email" id="example-email" required>
                                    </div>
                                </div>
                                    <div class="form-group col-6">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="tel" placeholder="078 456 7890" class="form-control form-control-line" value="{{ Auth::user()->phone }}" required name="phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-success" id="btnSave" style="float: right" value="Update Profile"/>
                                    </div>
                                </div>
                            </form>
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
        $(document).ready(function () {

            $('#infoForm').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize()
                }).done(function (data) {
                    console.log(data);

                    if (data.info == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table

                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Info successfully Updated. </div>');

                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });
                    }
                }).fail(function (response) {
                    console.log(response.responseJSON);

                    btn.button('reset');
//                    showing errors validation on pages

                    var option = "";
                    option += response.responseJSON.message;
                    var data = response.responseJSON.errors;
                    $.each(data, function (i, value) {
                        console.log(value);
                        $.each(value, function (j, values) {
                            option += '<p>' + values + '</p>';
                        });
                    });
                    $('#add-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>' + option + '</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });

                    //alert("Internal server error");
                });
                return false;
            });

        });
    </script>

@endsection
