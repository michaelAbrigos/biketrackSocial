@extends('Layouts.master')

@section('content')

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
			<div class="row">
				<div class="col-sm-8">	
					@foreach($users as $user)
				<div class="card friend-box">
					<div class="card-body">
						<div class="row">
			   	 			<div class="col-md-12 image-div">
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
						<button type="button" class="btn btn-raised btn-primary" style="float: right;">Add Friend</button>
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