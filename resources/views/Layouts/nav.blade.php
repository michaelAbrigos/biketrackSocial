<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light nav-color">
  @role('peers')
  <a href="{{route('location.index')}}"><img src="{{asset('/icons/BTStxtOR.svg')}}" style="height: 40px"></a>
  @else
  <a href="{{route('home')}}"><img src="{{asset('/icons/BTStxtOR.svg')}}" style="height: 40px"></a>
  @endrole
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
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
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
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


