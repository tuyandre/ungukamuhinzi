<nav class="navbar navbar-fixed rounded-0">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle custom-toggler" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.html"><img class="image-res1" src="{{asset('frontend/assets/logo.png')}}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
                <li class="menu-active" onClick="Animate2id('#box2');" id="home"><a href="{{url('/farmer')}}" class="active"><img class="image-res"  src="{{asset('/backend/img/Shape.png')}}" alt=""> Home</a></li>
                <li><a href="stock.html" onClick="Animate2id('#box2');" id="stock"><img class="image-res"  src="{{asset('/backend/img/stock.png')}}" alt=""> Stock</a></li>
                <li><a href="order.html" onClick="Animate2id('#box2');" id="order"><img class="image-res"  src="{{asset('/backend/img/ordergood.png')}}" alt=""> Orders</a></li>
                <li><a href="feeds.html" onClick="Animate2id('#box2');" id="feeds"><img class="image-res"  src="{{asset('/backend/img/profilegood.png')}}" alt=""> Feeds</a></li>

                <li class="menu-has-children"><a href="profile.html" id="bestvision">Profile</a>
                </li>
                <li class="menu-has-children1"><a href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                    >Log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <!--</li>-->
            </ul>
        </div>
    </div>
</nav>
