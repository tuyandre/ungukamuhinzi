<header class="topbar bg-info ">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>


            <div class="d-none d-md-block text-center">
                <a class="sidebartoggler waves-effect waves-light d-flex align-items-center side-start" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    {{--<i class="mdi mdi-menu"></i>--}}
                    <img src="{{asset('/frontend/assets/logo.png')}}" class="light-logo" alt="pg" STYLE="height: 60px" />
                    {{--<span class="navigation-text ml-3"> ERS</span>--}}
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
                <!-- ============================================================== -->
                <li class="nav-item">
                    <a class="nav-link navbar-brand d-none d-md-block" href="/Administration">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Light Logo icon -->
                            <img src="{{asset('/frontend/assets/logo.png')}}" alt="homepage" class="light-logo" style="width: 65px;height: 30px" />
                        </b>

                    </a>
                </li>


            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $photo=Auth::user()->profile_photo_path;

                        ?>
                        @if(empty($photo))
                            <img src="{{ asset('backend/assets/users/default.jpg')}}" alt="user" class="rounded-circle" width="31">
                        @else
                            <img src="{{ asset('backend/assets/users/profiles/'.$photo)}}" alt="user" class="rounded-circle" width="31">

                        @endif
                        <span class="ml-2 user-text font-medium">{{ Auth::user()->fullname }}</span><span class="fas fa-angle-down ml-2 user-text"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                            <div class="">

                                @if(empty($photo))
                                    <img src="{{ asset('backend/assets/users/default.jpg')}}" alt="user" class="rounded" width="80">
                                @else
                                    <img src="{{ asset('backend/assets/users/profiles/'.$photo)}}" alt="user" class="rounded" width="80">
                                @endif
                            </div>
                            <div class="ml-2">
                                <h4 class="mb-0">{{ Auth::user()->fullname }} </h4>
                                <p class=" mb-0 text-muted"><a href="{{ Auth::user()->email }}" class="__cf_email__" data-cfemail="f1879083849fb1969c90989ddf929e9c">{{ Auth::user()->email }}</a></p>
                                <a href="#" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('admin.viewProfile')}}"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.getInfo')}}"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-1 ml-1">

                            </i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
