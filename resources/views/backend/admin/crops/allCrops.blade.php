@extends('backend.admin.shared.master')

@section('title','Unguka|Crop')
@section('css')
    <link href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/admin/dashboard/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/admin/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css')}}" rel="stylesheet">
  <link r type="text/css"
          href="{{asset('/backend/admin/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('items','Crops List ')
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-secondary text-white mb-0">
                    All  Crop List
                    <button class="btn btn-success btn-flat btn-sm add_survey" style="float: right">
                        <i class="fa fa-plus"></i>Add Crops</button>
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Crop Name</th>
                                <th>Photo</th>
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
    {{--add modal--}}
    <div class="modal " id="addModal" tabindex="-1" role="dialog" aria-labelledby="season">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New Season</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{route('admin.crops.store')}}" id="frmSave">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages"></div>
                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Crops Name</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                <span class="text-danger" id="tname" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Crops Photo</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                <span class="text-danger" id="tname" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div id="add-messages"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave" data-loading-text="Loading..." value="Save Season"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--/add modal--}}

    {{--edit modal for subcategory--}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="Survey">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Crop</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal"  action="{{route('admin.crops.updateCrop')}}" id="editForm">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div id="edit-messages"></div>

                        <div class="modal-loading"
                             style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span>

                        </div>

                        <div class="edit-result">

                            <div class="form-group row">
                                <label for="edit-name" class="control-label col-sm-3">Crop</label>
                                <label class="col-sm-1 control-label">:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="edit-name" name="name" required autofocus>
                                    <span class="text-danger" id="ename" style="color: red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer editFooter">

                            <input type="hidden" name="id" id="id"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="editBtn"
                                    data-loading-text="Loading...">
                                <i class="glyphicon glyphicon-ok-sign"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ Session::token() }}" id="token">

@endsection
@section('js')
    <script src="{{asset('/backend/dashboard/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        var defaultUrl = "{{ route('admin.crops.allCrops') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'crops'
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

                    {data: 'crops'},
                    {data: 'crops'},
                    {
                        data: 'id',
                        render: function (data, type, row) {

                            return  "<button  data-url='/Administration/Crops/show/" + row.id + "' class='btn btn-secondary btn-sm btn-flat js-edit' data-id='" + data +
                                "' > <i class='fa fa-edit'></i>Edit</button>" +
                                "<a  href='/Administration/Crops/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-detail' data-id='" + data +
                                "' > <i class='fa fa-eye'></i>View</a>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/Administration/Crops/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";


                        }
                    }
                ]
            });
        }


        $(document).ready(function () {

            $(".add_survey").click(function () {
                $("#addModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });

            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })

//initialize data table
            myFunc();



            //Edit and update
            manageTable.on('click', '.js-edit', function () {
                $('#editModal').modal('show');
                var footer = $('.editFooter');
                $('.modal-loading').show();
                $('.edit-result').hide();
                footer.hide();
                var url = $(this).attr('data-url');
                var id = $(this).attr('data-id');
                // console.log(url);
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        // modal loading
                        $('.modal-loading').hide();
                        // modal result
                        $('.edit-result').show();
                        // modal footer
                        footer.show();
                        // setting values returned
                        $("#edit-name").val(response.crops.crops);

                        // add hidden id
                        $('#id').val(response.crops.id);
                        // update - form
                        $('#editForm').unbind('submit').bind('submit', function (e) {
                            e.preventDefault();
                            var form = $(this);
                            form.parsley().validate();
                            if (!form.parsley().isValid()) {
                                return false;
                            }
                            // edit btn
                            $('#editBtn').button('loading');

                            $.ajax({
                                url: form.attr('action'),
                                type: 'PUT',
                                data: form.serialize()
                            }).done(function (response) {
                                // submit btn
                                $('#editBtn').button('reset');
//                                form[0].reset();
                                // reload the table
                                table.destroy();
                                myFunc();
                                // remove the error text
                                $(".text-danger").remove();
                                // remove the form error
                                $('#edit-messages').html('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Crops  successfully updated. </div>');

                                $(".alert-success").delay(500).show(10, function () {
                                    $(this).delay(3000).hide(10, function () {
                                        $(this).remove();
                                    });
                                }); // /.alert
                            }).fail(function (response) {
                                console.log(response);
                                $('#editBtn').button('reset');
                                var errors = "";
                                errors+="<b>"+response.responseJSON.message+"</b>";
                                var data=response.responseJSON.errors;

                                $.each(data,function (i, value) {
                                    console.log(value);
                                    if (i=='name'){
                                        $('#ename').html(value[0])
                                    }
                                    $.each(value,function (j, values) {
                                        errors += '<p>' + values + '</p>';
                                    });
                                });
                                $('#edit-messages').html('<div class="alert alert-danger flat">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');

                                $(".alert-success").delay(500).show(10, function () {
                                    $(this).delay(3000).hide(10, function () {
                                        $(this).remove();
                                    });
                                });
                            });	 // /ajax

                            return false;
                        }); // /update - form

                    } // /success
                }); // ajax function
            });

            manageTable.on('click', '.js-delete', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Delete this Crops?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'delete',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Crops Delete successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Crops not Delete please try again"
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
    <script src="{{asset('/backend/admin/dashboard/js/dataTables.min.js')}}"></script>

@endsection
