@extends('frontend.shared.master')

@section('title','UNG|Register')
@section('css')

@endsection
@section('content')
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





            <div class="col-md-5 col-lg-5 col-md-offset-1 col-sm-12 col-xs-12" id="signup"  style="margin-top: 40px;margin-bottom: 80px;">
                <div class="panel1 panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <a href="#" class="active" id="login-form-link">Sign In</a>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-9 col-md-offset-2 mx-auto text-center">
                            <div class="myform form ">

                                <form class="formValidate" id="contactForm" action="#" method="post" name="login"    e.preventDefault();>
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" value="{{ Session::token() }}" id="token">
                                        <input type="text"  name="phone" id="phone11"  class="form-control my-input"  placeholder="Phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password"  id="repeatpassword110" name="password"  class="form-control my-input" minlength="6"  placeholder="password" required>
                                    </div>
                                    <div class="form-group">

                                        <div class="alert alert-success" id="loginSucces" style="display: none">



                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-offset-1 for">
                                        <div class="form-group password-forgotten">

                                            <a href="#" tabindex="5" id="forgot" class="forgot-password2">Forgot Password?</a>
                                            <a href="{{url('/')}}" tabindex="3" class="forgot-password4" id="sign-in-button" style="margin-left: 10px">Sign Up</a>
{{--                                            <a href="{{url('/')}}" tabindex="3" class="forgot-password4" id="sign-in-button">Sign Up</a>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-offset-1">
                                        <div class="text-center ">
                                            <button type="button" class="btn btn-success btn-rounded-circle btn-block z-depth-0 my-4 btn-register1" id="lodinBtn0" type="submit">Sign in</button>
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


@endsection
@section('js')
    <script src="{{asset('frontend/js/login.js')}}"></script>

@endsection
