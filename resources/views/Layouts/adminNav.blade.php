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
                
                    <ul class="navbar-nav">
                        <li class="nav-item pr-2" style="padding-top: 5px;">
                            <a href="{{route('home')}}">Home</a>
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