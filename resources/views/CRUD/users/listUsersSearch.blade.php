@extends('Layouts.master')

@section('content')

<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
   	@include('Layouts.sidebar')
	<main class="bmd-layout-content">
		<div class="container">
			<h3 style="margin-top: 50px;">Search Results</h3>
			
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
				   	 			<div class="col-md-2 col-sm-12 image-div">
				   	 				<center><img src="{{asset('avatars/male1.svg')}}" height="100px"></center>
				   	 			</div>
				   	 			<div class="col-md-6 col-sm-12 name-div">
				   	 				<h3>{{ $user->first_name." ".$user->last_name }}</h3>
				   	 				<h5>({{ $user->user->username }})</h5>
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
	</main>
</div>

@endsection