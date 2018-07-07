@extends('Layouts.master')

@section('content')

@include('Layouts.sidebar')
<div class="main">
	<div class="row" style="margin-right: 0px !important">
		<div class="col" style="padding-top: 10px; "><h5 class="font-adam">Search Results</h5></div>
  	</div>
		
		@if (session('status'))
		    <div class="alert alert-secondary">
		        {{ session('status') }}
		    </div>
		@endif
		
		@if(count($users) > 0)
					
				@foreach($users as $user)
					
					<div class="card" style="margin-bottom: 14px;">
						<div class="card-body">
							<div class="row">
				   	 			<div class="col-md-6" style="display: inline-block;">
				   	 				
			   	 					@if($user->information->gender == "Male")
			   	 						<img src="{{asset('avatars/male1.svg')}}" height="50px">
									@else
										<img src="{{asset('avatars/female.svg')}}" height="50px">
									@endif
				   	 				
				   	 				<p style="display: inline-block;">{{ $user->information->first_name." ".$user->information->last_name }}</p>
				   	 				<p style="display: inline-block;" class="text-muted">({{ $user->username }})</p>

				   	 			</div>
				   	 			<div class="col-md-6">
				   	 		
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

		   	 			</div>
		   	 				
					</div>
					
				@endforeach
				
		@else
			<div class="alert alert-secondary">
			    No users found. Please search again!
			</div>
		@endif

</div>


@endsection