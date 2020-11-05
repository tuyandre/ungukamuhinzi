@extends('frontend.shared.master')

@section('title','')
@section('css')

@endsection
@section('content')

    <div class="container" id="index-container">
        <div class="row" id="carousel1">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" id="signupPanel">

                <div class="row">
                    <div class="col-md-10  pull-center">
                        <!--Carousel Wrapper-->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="item-box-blog">
                                        <div class="item-box-blog-image ">

                                            <img class="col-sm-offset-2" src="{{asset('frontend/assets/tour 1-011.png')}}" alt="Chicago" class="img img-responsive col-sm-offset-3">
                                        </div>
                                        <div class="item-box-blog-body">
                                            <!--Heading-->
                                            <div class="item-box-blog-heading">
                                                <a href="#" tabindex="0">
                                                    <h5 class="text-center" style="color: black;">News Title</h5>
                                                </a>
                                            </div>
                                            <!--Data-->
                                            <div class="item-box-blog-data">
                                                <!-- <p><i class="fa fa-user-o"></i> <i class="fa fa-comments-o"></i> </p> -->
                                            </div>
                                            <!--Text-->
                                            <div class="item-box-blog-text col-md-10 col-md-offset-1">
                                                <p class="text-center">Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing.</p>
                                            </div>
                                            <!-- <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div> -->
                                            <!--Read More Button-->
                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="item-box-blog">
                                        <div class="item-box-blog-image">
                                            <!--Date-->
                                            <!-- <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div> -->
                                            <!--Image-->
                                            <img class="col-sm-offset-2"  src="{{asset('frontend/assets/tour 1-011.png')}}" alt="Chicago" class="img img-responsive col-sm-offset-3">
                                        </div>
                                        <div class="item-box-blog-body">
                                            <!--Heading-->
                                            <div class="item-box-blog-heading">
                                                <a href="#" tabindex="0">
                                                    <h5 class="text-center" style="color: black;">News Title</h5>
                                                </a>
                                            </div>
                                            <!--Data-->
                                            <div class="item-box-blog-data" style="padding: 15px 15px;">
                                                <!-- <p><i class="fa fa-user-o"></i><i class="fa fa-comments-o"></i></p> -->
                                            </div>
                                            <!--Text-->
                                            <div class="item-box-blog-text col-md-10 col-md-offset-1">
                                                <p class="text-center">Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing.</p>
                                            </div>
                                            <!-- <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div> -->
                                            <!--Read More Button-->
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-box-blog">
                                        <div class="item-box-blog-image">
                                            <!--Date-->
                                            <!-- <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div> -->
                                            <!--Image-->
                                            <img class="col-sm-offset-2"  src="{{asset('frontend/assets/tour 1-011.png')}}" alt="Chicago" class="img img-responsive col-sm-offset-3">
                                        </div>
                                        <div class="item-box-blog-body">
                                            <!--Heading-->
                                            <div class="item-box-blog-heading">
                                                <a href="#" tabindex="0">
                                                    <h5 class="text-center" style="color: black;">News Title</h5>
                                                </a>
                                            </div>
                                            <!--Data-->
                                            <div class="item-box-blog-data" style="padding: 15px 15px;">
                                                <!-- <p><i class="fa fa-user-o"></i> <i class="fa fa-comments-o"></i></p> -->
                                            </div>
                                            <!--Text-->
                                            <div class="item-box-blog-text col-md-10 col-md-offset-1">
                                                <p class="text-center">Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing.</p>
                                            </div>
                                            <!-- <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div> -->
                                            <!--Read More Button-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Left and right controls -->
                        </div>
                        <!--/.Carousel Wrapper-->
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 col-md-offset-1" id="signup">
                <div class="panel1 panel-login">
                    <strong class="text-success"></strong>
                    <div class="row">
                        <div class="col-md-9 mx-auto" id="sides-belongs">
                            <div class="myform form">
                                <div id="boxes" class="bodytext">
                                    <div id="dialog" class="window">
                                        <strong class="text-success">Which side are you on ?</strong>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <input type="radio" name="rdotnc" id="rdo1" value="1"/><span class="font-weight-bold">Farmer</span>
                                        <br />
                                        <br />
                                        <div class="col-md-12" >
                                            <p class="text-justify">Evaluate your Daily expenses, as well as your profits, with the help of best farming tools</p>
                                        </div>
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <input type="radio" name="rdotnc" id="rdo2" value="2"/><span class="font-weight-bold">Client</span>
                                        <br />
                                        <br />
                                        <div class="col-md-12" >
                                            <p class="text-justify">Evaluate your Daily expenses, as well as your profits, with the help of best farming tools</p>
                                        </div>
                                        {{--                                        </asp:RadioButtonList>--}}
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-block" id="index-button" >GET STARTED</button>
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
    </div>
@endsection
@section('js')


@endsection
