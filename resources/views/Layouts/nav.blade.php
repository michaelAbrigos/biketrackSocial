<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: none;">
  <meta name="_token" content="{!! csrf_token() !!}" />
  @role('peers')
  <a class="icon-mobile" href="{{route('location.index')}}"><img src="{{asset('/icons/BTStxtOR.svg')}}" style="height: 40px"></a>
  @else
  <a class="icon-mobile" href="{{route('home')}}"><img src="{{asset('/icons/BTStxtOR.svg')}}" style="height: 40px"></a>
  @endrole
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " style="margin-left: 10px; " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @guest
      @else
      <li class="nav-item">
              <form class="form-inline mt-md-0" action="{{route('search')}}" method="get">
                <div class="input-group" style="">
                  <div class="input-group-prepend">
                      <button class="btn my-2 my-sm-0" type="submit" style="padding-left: 5px; padding-right: 5px;">
                        <i class="material-icons" style="font-size: 18px">search</i>
                      </button>
                  </div>
                  <input class="form-control mr-sm-2 search" style="background-image: none;" name="searchterm" type="text" size="25" placeholder="search">
              </form>
          </div>
         </li>
      @endif
        
    </ul>
    
    @guest
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
      </ul>
    @else
      <ul class="navbar-nav">
        @role('peers')
        <li class="nav-item small-only">
          <a class="nav-link" href="location">Real Time Location</a>
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">notifications</i><span class="badge badge-light">{{ count(Auth::user()->unreadNotifications) }}</span></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"">
            <h6 class="dropdown-header">Friend Requests</h6>
            @if(count(Auth::user()->unreadNotifications)==0)
              <h6 class="dropdown-item">No friend requests</h6>
            @else
            @foreach(Auth::user()->unreadNotifications as $request)
            <div class="">
                <a class="dropdown-item" href="{{route('friends.requests')}}" style="display: inline-block; max-width: none;">
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
        <li class="nav-item small-only">
          <a class="nav-link" href="location">Real Time Location</a>
        </li>
        <li class="nav-item small-only">
          <a class="nav-link" href="groups">Group</a>
        </li>
        <li class="nav-item small-only">
          <a class="nav-link" href="">Places</a>
        </li>
        <li class="nav-item small-only">
          <a class="nav-link" href="peers">Peers</a>
        </li>
        @endrole
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->information->first_name }}</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"">
            <a class="dropdown-item" href="{{ route('account.index')}}">Account</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </ul>
    @endguest
    
  </div>
</nav>


