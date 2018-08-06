<div class="sidenav">
@role('peers')
  <a href="{{route('location.index')}}"><img src="{{asset('/icons/BTStxtOR.svg')}}" style="height: 70px;width: 155px"></a>
  @else
  <a href="{{route('home')}}"><img src="{{asset('/icons/BTStxtOR.svg')}}" style="height: 70px;width: 155px"></a>
  @endrole
	@role('peers')
	 <a href="/location">Real Time Location</a>
	@else
	<div class="link-group">	
	  <a href="/location"><i class="material-icons sidenav-icons">place</i>My Location</a>
	  <a href="/groups"><i class="material-icons sidenav-icons">supervised_user_circle</i>Groups</a>
	  <a href="/peers"><i class="material-icons sidenav-icons">person</i>Peers</a>
	  <a href="/friends"><i class="material-icons sidenav-icons">supervisor_account</i>Friends</a>
	  <a href="/history"><i class="material-icons sidenav-icons">history</i>History</a>
	</div>
	@endrole
</div>