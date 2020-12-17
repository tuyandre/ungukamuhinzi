@extends('frontend.shared.master')

@section('title','UNG|Register')
@section('css')

@endsection
@section('content')

    <!-- SIGN UP FORM -->
    <div class="container index-container" id="sign-up-panel">
        <div class="row " id="carousel1">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" id="signupPanel">

                <div class="row">
                    <div class="col-md-10  pull-center">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="item-box-blog">
                                        <div class="item-box-blog-image ">
                                            <img class="col-sm-offset-2 col-lg-offset-2 col-md-offset-2" src="{{asset('frontend/assets/tour 1-011.png')}}" alt="Chicago" class="img img-responsive col-sm-offset-3">
                                        </div>
                                        <div class="item-box-blog-body">
                                            <div class="item-box-blog-heading">
                                                <a href="#" tabindex="0">
                                                    <h5 class="text-center" style="color: black;">News Title</h5>
                                                </a>
                                            </div>
                                            <div class="item-box-blog-data">
                                            </div>
                                            <div class="item-box-blog-text col-md-12">
                                                <p class="text-center">Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="item-box-blog">
                                        <div class="item-box-blog-image">
                                            <img class="col-sm-offset-2"  src="{{asset('frontend/assets/tour 1-011.png')}}" alt="Chicago" class="img img-responsive col-sm-offset-3">
                                        </div>
                                        <div class="item-box-blog-body">
                                            <div class="item-box-blog-heading">
                                                <a href="#" tabindex="0">
                                                    <h5 class="text-center" style="color: black;">News Title</h5>
                                                </a>
                                            </div>
                                            <div class="item-box-blog-data" style="padding: 15px 15px;">
                                            </div>
                                            <div class="item-box-blog-text col-md-12">
                                                <p class="text-center">Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="item-box-blog">
                                        <div class="item-box-blog-image">
                                            <img class="col-sm-offset-2"  src="{{asset('frontend/assets/tour 1-011.png')}}" alt="Chicago" class="img img-responsive col-sm-offset-3">
                                        </div>
                                        <div class="item-box-blog-body">
                                            <div class="item-box-blog-heading">
                                                <a href="#" tabindex="0">
                                                    <h5 class="text-center" style="color: black;">News Title</h5>
                                                </a>
                                            </div>
                                            <div class="item-box-blog-data" style="padding: 15px 15px;">
                                            </div>
                                            <div class="item-box-blog-text col-md-12">
                                                <p class="text-center">Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-md-offset-1 col-sm-12 col-xs-12" id="signup"  style="margin-top: 40px;">
                <div class="panel1 panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <a href="#" class="active" id="login-form-link">Sign up</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-md-offset-2 mx-auto text-center">
                            <div class="myform form ">
                                <form class="formValidate" id="contactForm" action="" method="post" name="login"    e.preventDefault();>
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <h1 class="formersid"></h1>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ Session::token() }}" id="token">
                                        <input type="text" name="fullname"  class="form-control my-input" id="name1" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control my-input" id="emailg111" placeholder="Phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="identity" class="form-control my-input" id="identity" placeholder="Identity(National Id)" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password"  class="form-control my-input" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password"  id="password11" name="confirmPassword"  class="form-control my-input" placeholder="repeat password" required>
                                    </div>
                                    <div class="form-group">

                                        <div class="alert alert-success" id="loginSucces" style="display: none">

                                        </div>
                                    </div>
                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <a href="#" tabindex="5" class="forgot-password">Already have an account?</a>
                                            <a href="#" tabindex="3" class="forgot-password1" id="sign-in-button111o">Sign In</a>
                                        </div>
                                    </div>

                                    <div class="col-md-10 col-sm-offset-1">
                                        <div class="text-center ">
                                            <button type="button"class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register" id="signup-id10222" >Sign up</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END OF SIGN UP FORM -->


@endsection
@section('js')
    <script src="{{asset('frontend/js/SignUp.js')}}"></script>

@endsection
