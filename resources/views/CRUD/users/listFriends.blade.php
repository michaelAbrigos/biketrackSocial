@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
<div class="main-container">
	
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 col-md-9 mb-1 order-md-2 table-responsive mt-3">
                	@if(count($friend2)==0)
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
                		<div class="col-md-9"><h5>List of Groups</h5></div>
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
                        	@foreach($friend2 as $friend)
                        	<tr class="bg-white">
                        		<th scope="row" id="card-{{$friend->id}}">
                                    <a class="media align-items-center" href="#">
                                    	@if($friend->information->gender == "Female")
										<img src="{{asset('avatars/female.svg')}}" class="avatar rounded avatar-sm">
										@else
										<img src="{{asset('avatars/male1.svg')}}" class="avatar rounded avatar-sm">
										@endif
              
                                        <div class="media-body">
                                            <span class="h6 mb-0">{{$friend->information->first_name}} {{$friend->information->last_name}}</span>
                                        </div>
                                    </a>
                                </th>
                        		<td class="text-right"><button type="button" class="btn btn-raised btn-success">View</button>
                        		<button type="button" class="btn btn-raised btn-danger" data-target="#confirmDeleteModal-{{$friend->id}}" data-toggle="modal">Unfriend</button></td>
                        		
                        	</tr>
                        	<tr class="table-divider"></tr>
                        	@include('CRUD.users.confirmDeleteFriend_modal')
                        	@endforeach
                        </tbody>
                    </table>
                    @endif
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