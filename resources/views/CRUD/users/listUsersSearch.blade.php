@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />

<div class="main-container">
	<div class="container mt-2">
        <div class="row">
            <div class="col-12 col-md-9 mb-1 order-md-2 table-responsive mt-3">
            	@if(count($users)==0)
                	<section class="height-70">
		                <div class="container">
		                    <div class="row justify-content-center">
		                        <div class="col-12 col-md-6 col-lg-5">
		                            <div class="card card-lg text-center">
		                                <div class="card-body">
		                                    <i class="material-icons opacity-20 display-4">person_add</i>
		                                    <h1 class="h5">You haven't created anything yet</h1>
		                                    <p>
		                                        Start creating all types of things by hitting the button below. Let's start the journey now
		                                    </p>
		                                    <button class="btn btn-success">So sad :(</button>
		                                </div>
		                            </div>
		                        </div>
		                        <!--end of col-->
		                    </div>
		                    <!--end of row-->
		                </div>
		                <!--end of container-->
		            </section>
            	@else
            	
            	<div class="row">
            		<div class="col-md-9"><h5>Search Results</h5></div>
            		<div class="col text-right"><a href="{{route('friends.requests')}}" class="btn btn-warning">All Friend Requests</a></div>
            	</div>
            	
                <table class="table table-borderless table-hover align-items-center">
                	<thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($users as $user)
                    	<tr class="bg-white">
                    		<th scope="row" id="card-{{$user->id}}">
                                <a class="media align-items-center" href="#">
                                	@if($user->information->gender == "Female")
									<img src="{{asset('avatars/female.svg')}}" class="avatar rounded avatar-sm">
									@else
									<img src="{{asset('avatars/male1.svg')}}" class="avatar rounded avatar-sm">
									@endif
          
                                    <div class="media-body">
                                        <span class="h6 mb-0">{{ $user->information->first_name." ".$user->information->last_name }}</span>
                                        <small><p style="display: inline-block;" class="text-muted">({{ $user->username }})</p></small>
                                    </div>
                                </a>
                            </th>
                    		<td class="text-right">
                    			@if(in_array($user->id,$requested))
			   	 					<div class="btn-group" style="float: right;">
									  <button type="button" class="btn btn-raised btn-warning" disabled>Request Sent</button>
									  <button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <div class="dropdown-menu">
									    <a class="dropdown-item cancelRequest" href="#" value="{{$user->id}}">Cancel Request</a>
									  </div>
									</div>
								@elseif(in_array($user->id,$requests))
									<div class="btn-group" style="float: right;">
									  <button type="button" class="btn btn-warning" id="confirmFriend" value="{{$user->id}}">Confirm Request</button>
									  <button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <div class="dropdown-menu">
									    <a class="dropdown-item" href="#" id="declineFriend">Decline Request</a>
									  </div>
									</div>
								@elseif(in_array($user->id,$friend2))
									<button type="button" class="btn btn-raised btn-warning" id="{{$user->id}}" value="{{$user->id}}" style="float: right;">View Profile</button>
			   	 				@else
			   	 					<button type="button" class="btn btn-raised btn-warning addFriend" id="{{$user->id}}" value="{{$user->id}}" style="float: right;">Add Friend</button>
									
			   	 				@endif
                    		</td>
                    		
                    	</tr>
                    	<tr class="table-divider"></tr>
                    	
                    	@endforeach
                    </tbody>
                </table>
                @endif
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                    </div>
            </div>
            <!--end of col-->
            <div class="col-12 col-md-3 mb-1 order-md-1 mt-3">
                @include('Layouts.newSidebar')
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
    </div>
        <!--end of container-->
    
 </div>



@endsection