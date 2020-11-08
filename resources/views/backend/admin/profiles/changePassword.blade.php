@extends('backend.admin.shared.master')

@section('title','ChangePassword')
@section('css')
    <link href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('items','Profile Change Password')
@section('content')


    {{--<div class="col-8 col-md-offset-2">--}}


    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="material-card card">
                <div class="card-body">
                    <h4 class="card-title">Edit Password</h4>
                    <div class="bg-light p-3">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">

                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Edit Password</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" method="POST" action="{{ route('admin.updatePassword') }}" id="passwordForm">
                                        @csrf
                                        <div class="box-body">
                                            <div id="add-messages"></div>
                                            <div class="form-group row">
                                                <label for="oldp" class="col-sm-4 control-label">Old Password</label>

                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldp" placeholder="Old Password"  name="old_password" required>
                                                    @error('old_password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="newp" class="col-sm-4 control-label">New Password</label>

                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="newp" placeholder="New Password" name="password" required>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="confirm" class="col-sm-4 control-label">Confirm Password</label>

                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm" placeholder="confirm Password" name="confirm_password" required>
                                                    @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>
{{--                                        <!-- /.box-body -->--}}
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-warning" id="cancelId">Cancel</button>
                                            <input type="submit" class="btn btn-info pull-right" id="btnSave" style="float: right" value="Update Password">
                                        </div>
                                        <!-- /.box-footer -->
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--</div>--}}


@endsection
@section('js')
<script>
    $(document).ready(function () {


        $('#passwordForm').submit(function (e) {
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

                if (data.password == "ok") {
                    btn.button('reset');
                    form[0].reset();
                    // reload the table

                    $('#add-messages').html('<div class="alert alert-success flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Password successfully Changed. </div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });
                }else {
                    btn.button('reset');
                    $('#add-messages').html('<div class="alert alert-warning flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Invalid Previous Password. </div>');

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
                    if (i == 'name') {
                        $('#tname').html(value[0])
                    }
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
