<nav class="navbar navbar-fixed rounded-0">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle custom-toggler" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/Client')}}"><img class="image-res1" src="{{asset('frontend/assets/logo.png')}}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
                <li class="menu-active"><a href="{{url('/Client')}}"><img class="image-res"  src="{{asset('/backend/img/Shape.png')}}" alt=""> Home</a></li>
                <!-- <li><a href="Favourites.html"><img class="image-res"  src="img/stock.png" alt=""> Favourite</a></li> -->
                <li><a href="{{route('client.order.index')}}"><img class="image-res"  src="{{asset('/backend/img/ordergood.png')}}" alt=""> Orders</a></li>
                <li class="menu-has-children1"><a href="{{route('client.profile.index')}}" id="bestvision">Profile</a>
                </li>
                <li class="menu-has-children"><a href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
