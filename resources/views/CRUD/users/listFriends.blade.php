@extends('Layouts.master')

@section('content')

@include('Layouts.sidebar')
<div class="main">
	<div class="row" style="margin-right: 0px !important">
		<div class="col" style="padding-top: 10px; "><h5 class="font-adam">Friend List</h5></div>
		<div class="col text-right"><a href="{{route('friends.requests')}}" class="btn btn-warning">All Friend Requests</a></div>
  	</div>
	@if(count($listFriends)==0)
		<div class="alert alert-secondary" id="noPeer" role="alert">
			  Looks like you dont have any friends yet!
		</div>
	@else

	  	@foreach($listFriends as $key => $friend)
	  		
		  	@if($friend->pivot->confirmed == 0)
		  	
		  	@else
			  	<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								@if($friendInfo[$key]->information->gender == "Female")
								<img src="{{asset('avatars/female.svg')}}" height="50px;">
								@else
								<img src="{{asset('avatars/male1.svg')}}" height="50px;">
								@endif
								<p style="display: inline-block;">{{$friendInfo[$key]->information->first_name}} {{$friendInfo[$key]->information->last_name}}</p>
							</div>
							<div class="col-md-6 text-right small-center">
								<button type="button" class="btn btn-raised btn-success">View</button>
								<button type="button" class="btn btn-raised btn-danger">Unfriend</button>
							</div>
						</div>
					</div>	
				</div>
		  	@endif
		  	<br>
	  	@endforeach
	  	@endif
</div>
@endsection