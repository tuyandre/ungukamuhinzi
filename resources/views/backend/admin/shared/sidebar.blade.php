<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="#" aria-expanded="false">
                        <?php
                        $photo=Auth::user()->profile_photo_path;

                        ?>
                        @if(empty($photo))
                            <img src="{{ asset('backend/assets/users/default.jpg')}}" class="rounded-circle ml-2" width="30">
                        @else
                            <img src="{{ asset('backend/assets/users/profiles/'.$photo)}}" class="rounded-circle ml-2" width="30">
                        @endif
                        <span class="hide-menu">{{ Auth::user()->fullname }}  </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('admin.viewProfile')}}" class="sidebar-link">
                                <i class="ti-user mr-1 ml-1"></i>
                                <span class="hide-menu"> My Profile </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.getPassword')}}" class="sidebar-link">
                                {{--<i class="ti-settings mr-1 ml-1"></i>--}}
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                                <span class="hide-menu"> Change Password </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.getInfo')}}" class="sidebar-link">
                                <i class="fa fa-user-edit"></i>
                                <span class="hide-menu">Edit Account  </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.getProfile')}}" class="sidebar-link">
                                <i class="fa fa-user-edit"></i>
                                <span class="hide-menu">Change Profile  </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/Administration" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="#" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu">Customers  </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('admin.customer.index')}}" class="sidebar-link">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu"> All Customers </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.customer.suspended')}}" class="sidebar-link">
                                {{--<i class="ti-settings mr-1 ml-1"></i>--}}
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                                <span class="hide-menu"> Suspended Customers </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.customer.active')}}" class="sidebar-link">
                                <i class="fa fa-user-edit"></i>
                                <span class="hide-menu">Active Customers  </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-tasks"></i>
                        <span class="hide-menu">Survey</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-paper-plane"></i>
                        <span class="hide-menu">Send Survey</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-briefcase"></i>
                        <span class="hide-menu">Projects Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-briefcase"></i>
                        <span class="hide-menu">Project Subcategory</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="ti-package mr-1 ml-1"></i>
                        <span class="hide-menu">Projects</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-th-list"></i>
                        <span class="hide-menu">Project Files</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="ti-pencil-alt mr-1 ml-1"></i>
                        <span class="hide-menu">New Message</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="ti-comment-alt mr-1 ml-1"></i>
                        <span class="hide-menu">Sent Message</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="hide-menu">Applications</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="far fa-comments"></i>
                        <span class="hide-menu">Contact Us</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="fa fa-question"></i>
                        <span class="hide-menu">Call Request</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
