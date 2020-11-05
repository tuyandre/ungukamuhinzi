<nav class="navbar navbar-fixed rounded-0">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle custom-toggler" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img class="image-res1" src="{{asset('frontend/assets/logo.png')}}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{route('frontend.getLoginPage')}}" id="sign-in1">Sign in</a></li>
            </ul>
        </div>
    </div>
</nav>
