@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
@include('Layouts.sidebar')
<div class="main">

	<div class="container">
		<h3>Search Results</h3>
		
		@if (session('status'))
		    <div class="alert alert-secondary">
		        {{ session('status') }}
		    </div>

		@endif
		
		@if(count($users) > 0)
					
			<div class="card-deck">
				@foreach($users as $user)
				<div class="card friend-box">
					<div class="card-body">
						<div class="row">
			   	 			<div class="col-md-3 image-div">
			   	 				<center>
			   	 					@if($user->information->gender == "Male")
			   	 					<img src="{{asset('avatars/male1.svg')}}" height="100px">
									@else
									<img src="{{asset('avatars/female.svg')}}" height="100px">
									@endif
			   	 				</center>
			   	 			</div>
			   	 			<div class="col-md-6 col-sm-12 name-div">
			   	 				<h3>{{ $user->information->first_name." ".$user->information->last_name }}</h3>
			   	 				<h5>({{ $user->username }})</h5>
			   	 			</div>
			   	 			
		   	 			</div>

	   	 			</div>
	   	 			<div class="card-footer text-muted">
	   	 				
		   	 				@if(in_array($user->id,$friend_ids))
		   	 					<div class="btn-group" style="float: right;">
								  <button type="button" class="btn btn-raised btn-warning" disabled>Request Sent</button>
								  <button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="#">Cancel Request</a>
								  </div>
								</div>
							@elseif(in_array($user->id,$added_id))
								<div class="btn-group" style="float: right;">
								  <button type="button" class="btn btn-warning" id="confirmFriend">Confirm Request</button>
								  <button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="#" id="declineFriend">Decline Request</a>
								  </div>
								</div>
		   	 				@else
		   	 					<button type="button" class="btn btn-raised btn-warning" id="addFriend" value="{{$user->id}}" style="float: right;">Add Friend</button>
								
		   	 				@endif
						
		   	 			
					</div>
				</div>
				@endforeach
			</div>
				
			
		</div>
		@else
		<div class="alert alert-secondary">
		    No users found. Please search again!
		</div>
		@endif
	</div>
</div>


@endsection