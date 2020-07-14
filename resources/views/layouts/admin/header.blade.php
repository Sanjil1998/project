<!-- WRAPPER -->
    <div id="wrapper">
        @if(session()->get('message'))
            <div class="alert alert-success">
               {{ session()->get('message') }}
            </div>
        @endif

        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="{{ route('admin.dashboard') }}"><img src="{{URL::to('/')}}/public/assets/img/logo-dark.png" alt="Admin Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- <img src="{{URL::to('/')}}/public/assets/img/user.png" class="img-circle" alt="Avatar"> --> @auth <span class="text-capitalize">{{ Auth::user()->name}}</span> @endauth @guest<span>Samuel</span>@endguest <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.profile.index') }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="{{ route('admin.blogs.index') }}"><i class="lnr lnr-file-empty"></i> <span>Blogs</span></a></li>
                                @auth
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="lnr lnr-exit"></i> <span>Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>

                    <ul class="nav">
                        <li><a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

                         <li>
                            <a href="#subPages-profile" data-toggle="collapse" class="collapsed {{ Request::is('admin/profile') ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Profile</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages-profile" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{ route('admin.profile.index') }}" class="">My Profile</a></li>
                                    <li><a href="{{route('admin.profile.about')}}" class="">About Me</a></li>
                                    <li><a href="{{route('admin.blogs.create')}}" class="">Experience</a></li>
                                    <li><a href="{{route('admin.profile.work')}}" class="">Works</a></li>
                                    <li><a href="{{route('admin.profile.contact')}}" class="">Contact</a></li>
                                    <li><a href="{{route('admin.profile.files')}}" class="">Files</a></li>
                                </ul>
                            </div>
                        </li>

                        <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>

                        <li>
                            <a href="#subPages-blogs" data-toggle="collapse" class="collapsed {{ Request::is('admin/blogs') ? 'active' : '' }}"><i class="lnr lnr-file-empty"></i> <span>Blogs</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages-blogs" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{ route('admin.blogs.index') }}" class="">All Blogs</a></li>
                                    <li><a href="{{route('admin.blogs.create')}}" class="">Add Blog</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->




