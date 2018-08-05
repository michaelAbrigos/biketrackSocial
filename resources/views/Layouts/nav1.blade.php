<div class="nav-container">
    <div class="header-color navbar-dark" data-sticky="top">
        <div class="container">
            <nav class="navbar navbar-expand-lg" style="margin-left: 0px !important"> 
                <a class="navbar-brand" href="/home">
                    <img alt="Wingman" src="{{asset('icons/BTStxtOR.svg')}}" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="material-icons">menu</i>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        
                    </ul>
                    @guest

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('register')}}">Sign up</a>
                            <span>&nbsp;or&nbsp;</span><a href="{{route('login')}}"> Sign in</a>
                        </li>
                    </ul>
                    @else
                    <form class="form-inline col p-0 pl-md-2 pr-md-3" style="margin-bottom: 0px !important" action="{{route('search')}}" method="get">
                        <input class="form-control w-50" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item" style="padding-top: 5px;">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown" style="padding-right: 10px;">
                            <a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons alert-icon">notifications</i>
                                <span class="badge badge-danger">{{ count(Auth::user()->unreadNotifications) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01" style="padding: 13px 0;">
                                @if(count(Auth::user()->unreadNotifications)==0)
                                  <h6 class="dropdown-item">No notifications</h6>
                                @else
                                @foreach(Auth::user()->unreadNotifications as $request)
                                <h6 style="padding-left: 15px;"><b>Notifications</b></h6>
                                <div class="">
                                    <a class="dropdown-item" href="{{route('friends.requests')}}" style="display: inline-block; max-width: none; padding-bottom: 10px;">
                                    <div class="col-md-2" style="display: inline-block; padding-left: 0px;">@if($request->data["user"]["information"]["gender"] == "Male")
                                    <img src="{{asset('avatars/male1.svg')}}" height="50px;">
                                    @else
                                    <img src="{{asset('avatars/female.svg')}}" height="50px;">
                                    @endif</div>
                                    <div class="col-md-10" style="display: inline-block;top: 8px;padding-left: 15px;"> 
                                    {{ $request->data["user"]["information"]["first_name"]}} {{ $request->data["user"]["information"]["last_name"]}}<p style="font-size: 10px;">has sent you a friend request</p></div></a>
                                    
                                  </div>
                                  @endforeach
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img alt="Image" src="{{asset('/avatars/male1.svg')}}" class="avatar avatar-xs" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="/account">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest

                </div>
                <!--end nav collapse-->
            </nav>
        </div>
        <!--end of container-->
    </div>
</div>