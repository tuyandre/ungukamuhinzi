@extends('backend.client.shared.master')

@section('title','Home')
@section('css')

@endsection
@section('content')
    <!-- SEQRCH BOX  -->
    <div class="combine-ordero1">
        <div class="container">
            <div class="row main-search1" id="pic-mustbe-hidden">
            </div>
            <div class="row main-search" id="search-mustbe-sisplayed"  style="display: none;">
                <!-- END OF PICTURES -->
                <!-- START HERE SERCH BAR -->

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
                        <option  value="">Last Cycle</option>
                        <option  value="">Country 1</option>
                        <option  value="">Country 2</option>
                    </select>
                </div>
            </div>
            <!-- END OF SEARCH BAR HERE            -->

            <!-- STARE HORIZONTAL BAR HERE -->
            <div class="container col-md-12 under-search" id="horinzintal-bar-show"  style="display: none;">
                <div class="col-md-4">
                    <div class="col-md-10 rightppp" id="totalAmaunt">
                        <!-- <h2 class="text-center text-white font-weight-bold">SPENT: 234,000Rwf</h2> -->
                    </div>
                    <div class="col-md-2 col-md-offset-0 nav-img">
                        <img class="col-md-offset-7" src="{{asset('/backend/img/line.png')}}" alt="">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10 rightp" id="totalcrops">
                        <!-- <p class="text-center  centerp text-white">Purchased 13 Different Items</p> -->
                    </div>
                    <div class="col-md-2 col-md-offset-0 nav-img">
                        <img class="col-md-offset-7" src="{{asset('/backend/img/line.png')}}" alt="">

                    </div>

                </div>
                <div class="col-md-3 ">
                    <div class="col-md-10 rightp" id="totalkg">
                        <!-- <p class="text-center text-white">Purchased 167 Kgs</p> -->
                    </div>
                    <div class="col-md-2 col-md-offset-0">
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF SEARCH AND DROPBOX -->

        <section class="details-card" id="image-mustbe-hidden" style="margin-top:30px;">
            <div class="container">
                <a href="#" id="stats"><div class="col-md-6 graph-image">
                        <div class="col-md-6 farmer-profile">
                            <img class="col-md-offset-3" src="{{asset('/backend/img/charts.png')}}" alt="">
                        </div>
                        <div class="col-md-6 farmer-profile5">
                            <div class="col-md-offset-3">
                                <h1 class="pull-right">Stats</h1>
                            </div>
                            <div class="col-md-offset-4">
                                <p class="pull-right">presonal Details.</p>
                                <!-- <p class="pull-right">Password,</p>   -->
                            </div>
                        </div>
                    </div></a>
                <a href="#" id="setting"><div class="col-md-6 graph-image">
                        <div class="col-md-6 farmer-profil4">
                            <img class="col-md-offset-3" src="{{asset('/backend/img/setting.png')}}" alt="">
                        </div>
                        <div class="col-md-6 farmer-profile5">
                            <div class="col-md-offset-3">
                                <h1 class="pull-right">Setting</h1>
                            </div>
                            <div class="col-md-offset-4">
                                <p class="pull-right">presonal Details.</p>
                                <!-- <p class="pull-right">Password,</p>   -->
                            </div>
                        </div>
                    </div></a>
            </div>
        </section>



        <!-- section for click -->
        <section class="details-card" id="image-displayed" style="display: none; margin-top:50px;">
            <div class="container" id="order-pendingabdonat">
                <p class="col-md-12 font-weight-bold text-center" id="loginSucces12pro" style="display: none">


            </div>
        </section>

        <section class="My-Jesus"  id="click-info-order111111" style="display: none;">
            <div class=" container">
                <!-- <div class="row"> -->
                <div class="col-md-12 cards-info1" >
                    <div class="card info-info1 col-md-12">
                        <div class="row farm-upi11" id="abaveinfo">

                        </div>
                        <div class="card-body" id="info-body">

                            <!-- start of cards -->
                            <div class="row" id="info">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- for save change after modal -->
        <section class="My-Jesus111dd"  id="click-info-order111111111gdfgdfss" style="display:none;">
            <div class=" container">
                <!-- <div class="row"> -->
                <div class="col-md-12 cards-info111" >
                    <div class="card info-info111 col-md-12">
                        <div class="row farm-upi1111">
                            <p class="col-md-3  farm-text">
                                <a href="#" class="prev1">
                                    <img class="previous-button" src="{{asset('/backend/img/Chevron.png')}}" alt="" >
                                    <a href="#">Settings</a>
                                </a>
                            </p>

                        </div>
                        <div class="card-body" id="info-body">
                            <a href="#"><div class="form-group col-md-2">
                                    <p class="text-danger"  data-toggle="modal" data-target="#myModal3">Change</p>
                                </div></a>
                            <!-- start of cards -->

                            <div class="col-md-12" id="signup">
                                <div class="panel11 panel-login111">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="myform form ">
                                                <form class="contact" id="contactForm11ui" action="" method="post" name="login" enctype="multipart/form-data" e.preventDefault();>
                                                    <!-- <div class="form-group" > -->
                                                    <div class="alert alert-success" id="loginSucces" style="display: none">

                                                    </div>
                                                    <!-- </div>   -->
                                                    <div class="form-group col-md-3">
                                                        <p>Personal Information</p>
                                                    </div>
                                                    <a href="#"><div class="form-group col-md-2">
                                                            <p class="text-danger"  data-toggle="modal" data-target="#myModal1">Update</p>
                                                        </div></a>
                                                    <div class="form-group col-md-3">
                                                        <p>Personal Information</p>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <div class="col-md-6">
                                                            <input type="text" name="fname"  class="form-control my-input" id="fnames" placeholder="Fname">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="lname"  class="form-control my-input" id="lnames" placeholder="Lname">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <input type="number" name="identity" class="form-control my-input" id="Identity" placeholder="Identity">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <input type="number" name="phone" id="phones1"  class="form-control my-input1" placeholder="Phone">
                                                    </div>
                                                    <div class="form-group col-md-5" >
                                                        <input type="file" name="photo" id="picture" class="form-control" />
                                                    </div>
                                                    <div class="form-group" >
                                                        <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register" id="lodinBtn011klj" type="submit">submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="My-Jesus111"  id="click-info-order111111111" style="display:none;">
            <div class=" container">
                <div class="col-md-12 cards-info1" >
                    <div class="card info-info1 col-md-12">
                        <div class="row farm-upi11">
                            <p class="col-md-3  farm-text">
                                <a href="#" class="prev1" id="prev-for-graph">
                                    <img class="previous-button" src="{{asset('/backend/img/Chevron.png')}}" alt="">
                                    <a href="#">Setting</a>
                                </a>
                            </p>

                        </div>
                        <div class="card-body" id="info-body">
                            <h1 class="font-weight-bold text-center" >Complete your profile</h1>
                            <a href="#"><div class="form-group col-md-3">
                                    <!-- <p class="text-danger"  >Change password</p> -->
                                </div></a>
                            <div class="container col-md-12 under-search7" id="horinzintal-bar-show">
                                <div class="row rightp">
                                    <p class="col-md-5 col-md-offset-1  farm-text"><a href="#" class="text-success" data-toggle="modal" data-target="#myModal3">Change password</a></p>
                                    <p class="col-md-offset-1  farm-text1"><a href="#" class="active"><br /></a></p>
                                    <p class="col-md-offset-1  farm-text1"><a href="#" class="text-success font-weight-bold" id="update1" data-toggle="modal" data-target="#myModal9">Update</a></p>

                                </div>
                            </div>
                            <!-- start of cards -->
                            <form class="contact" id="contactForm11" action="" method="post" name="login" enctype="multipart/form-data" e.preventDefault();>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="fname"  class="form-control my-input" id="fnames" placeholder="Fname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="lname"  class="form-control my-input" id="lnames" placeholder="Lname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" name="identity" class="form-control my-input" id="Identity" placeholder="Identity">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" name="phone" id="phones1"  class="form-control my-input1" placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-6 col-md-offset-3" >
                                        <input type="file" class="col-md-offset-2" name="photo" id="picture" class="form-control" />
                                    </div>
                                    <!-- <div class="form-group col-md-offset-3" > -->
                                    <div class="alert alert-success col-md-6 col-md-offset-4" id="loginSucces" style="display: none">

                                    </div>
                                    <div class="form-group col-md-4 col-md-offset-4" >
                                        <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register" id="lodinBtn011" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>





    </div>


@endsection
@section('js')


@endsection
