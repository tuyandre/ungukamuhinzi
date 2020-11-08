@extends('shared.master')

@section('title','MemberList')
@section('css')
    <link href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/admin/dashboard/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/admin/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    {{--    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">--}}
    <link r type="text/css"
          href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('items','Member List ')
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Member List
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Telophone</th>
                                <th>Date</th>
                                <th>Status</th>
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
    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>

        var defaultUrl = "{{ route('members.getMembers') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'members'
                },
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Excel',
                    text:'Export to excel'
                    //Columns to export
                    //exportOptions: {
                    //     columns: [0, 1, 2, 3,4,5,6]
                    // }
                }
                ],
                columns: [

                    {data: 'first_name'},
                    {data: 'last_name'},
                    {data: 'email'},
                    {data: 'telephone'},
                    {data: 'date'},
                    {data: 'confirmed',
                        render: function (data, type, row) {
                            if(row.confirmed==1){
                                return "<span class='bg-success'> Activated</span>";
                            }else {
                                return "<span class='bg-warning'>Not  Activated</span>";
                            }

                        }},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            if(row.confirmed==1){
                                return"<a  href='/Administration/member/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                    "' data-url='/Administration/member/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                            }else {
                                return "<button class='btn btn-success btn-sm btn-flat js-confirm' data-id='" + data +
                                    "' data-url='/Administration/member/confirm/" + row.id + "'> <i class='fa fa-check'></i>Confirm</button>" +
                                    "<a  href='/Administration/member/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</a>" +
                                    "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                    "' data-url='/Administration/member/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";
                            }

                        }
                    }
                ]
            });
        }


        $(document).ready(function () {

//initialize data table
            myFunc();
            manageTable.on('click', '.js-confirm', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Confirm this member?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'PUT',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                if(data.result=="ok"){
                                    var tr = button.parents("tr");
                                    bootbox.alert({
                                        title: "success",
                                        message: "<i class='fa fa-success'></i>" +
                                            " User Confirmed successful"
                                    });
                                }else{
                                    var tr = button.parents("tr");
                                    bootbox.alert({
                                        title: "warning",
                                        message: "<i class='fa fa-warning'></i>" +
                                            " User Not Confirmed successful Because message not sent"
                                    });
                                }

                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " user not Confirmed please try again"
                                });
                            }
                        });

                    }
                })
            });


            manageTable.on('click', '.js-delete', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Delete this member?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'delete',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
//                            var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " User Delete successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " user not Delete please try again"
                                });
                            }
                        });

                    }
                })
            });


        });
    </script>
    <script src="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/admin/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/dashboard/js/dataTables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
@endsection
