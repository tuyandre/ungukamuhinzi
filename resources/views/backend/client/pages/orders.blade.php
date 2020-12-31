@extends('backend.client.shared.master')

@section('title','Home')
@section('css')

@endsection
@section('content')
    <!-- SEQRCH BOX  -->
    <div class="combine-order" style="padding:50px;">
        <div class="container">

            <div class="row main-search">

                <div class="form-group col-xs-6 col-md-8 search">
                    <div class="inner-addon right-addon">
                        <i class="glyphicon glyphicon-search"></i>
                        <input type="text" class="form-control" placeholder="Search" />
                    </div>
                </div>
                <div class="form-group col-xs-6 col-md-2 select">
                    <select class="form-control" placeholder="Country">
                        <option value="">All</option>
                        <option value="">Country 1</option>
                        <option value="">Country 2</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-md-2 select">
                    <select type="select" class="form-control" placeholder="Country">
                        <option  value="">All</option>
                        <option  value="">Country 1</option>
                        <option  value="">Country 2</option>
                    </select>
                </div>
            </div>

            <div class="container col-md-12">
                <div class="col-md-offset-4">
                    <ul class="lists">
                        <li class="delivered1"><a href="#" class="active" id="pending-client1">Pending</a></li>
                        <li class="Processing1"><a href="#" id="processing-orderclient">Processing</a></li>
                        <li class="delivered"><a href="#" id="pending-client">Delivered</a></li>
                        <li class="Cancelled1"><a href="#" id="canceled-orderclient">Cancelled</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- END OF SEARCH AND DROPBOX -->
        <section class="details-card" id="best-card-pending10">
            <div class="container best-pending-card11" >
                <div class="row" id="order-pendingab">
                    <div class="col-md-offset-2" id="spinner2"><img src="{{asset('/backend/img/snip.gif')}}"/></div>
                    <p class="col-md-12 font-weight-bold text-center" id="loginSuccescl" style="display: none">

                </div>

            </div>

            <!-- </div> -->
        </section>
        <section class="details-card" id="best-card-pending1" style="display: none;">
            <div class="container best-pending-card" >
                <div class="row" id="order-pendinga">
                    <p class="col-md-12 font-weight-bold text-center" id="loginSuccescld" style="display: none">

                </div>

            </div>

            <!-- </div> -->
        </section>

        <section class="details-card" id="open-processing2" style="display: none;">
            <div class="container best-pending-card">
                <div class="row" id="order-processing">
                    <p class="col-md-12 font-weight-bold text-center" id="loginSuccescl1" style="display: none">

                </div>

            </div>

            <!-- </div> -->
        </section>
        <section class="details-card" id="open-conceled3" style="display: none;">
            <div class="container best-pending-card">
                <div class="row" id="order-pendingcanceled">
                    <p class="col-md-12 font-weight-bold text-center" id="loginSuccesclc" style="display: none">

                </div>

            </div>

            <!-- </div> -->
        </section>


        <div class="modal fade" id="myModal9" style="margin-top:10px;">
            <div class="modal-dialog">
                <div class="modal-content"  id="customerid1">

                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" style="padding:110px; margin-top:70px;">
            <div class="modal-dialog">
                <div class="modal-content" id="customerid1">

                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal3" style="padding: 50px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Change your password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  class="form-horizontal col-md-offset-3" method="post" >
                        <div id="div_id_email" class="form-group required">
                            <div class="controls col-md-8 ">
                                <input type="password" class="form-control input-lg" id="oldpassword" name="current_password" placeholder="Old-password">
                            </div>
                        </div>
                        <div id="div_id_password1" class="form-group required">
                            <div class="controls col-md-8 ">
                                <input type="password" class="form-control input-lg" id="new-password" name="new_password" placeholder="New-password">
                            </div>
                        </div>
                        <div id="div_id_password2" class="form-group required">
                            <div class="controls col-md-8 ">
                                <input type="password" class="form-control input-lg" id="confirmpassword" name="confirmPassword" placeholder="Confirm-password">
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required">
                            <div class="controls col-md-8 ">
                                <div class="alert alert-success" id="loginSucces" style="display: none">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls col-md-8 ">
                                <button type="button" class="btn btn-success col-md-5 col-md-offset-3" id="change">
                                    Change
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('js')


@endsection
