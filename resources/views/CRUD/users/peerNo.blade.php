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
			                            <div class="card card-lg text-center" id="noPeer">
			                                <div class="card-body">
			                                    <i class="material-icons opacity-20 display-4">person_add</i>
			                                    <h1 class="h5">You haven't created anything yet</h1>
			                                    <p>
			                                        Start creating all types of things by hitting the button below. Let's start the journey now
			                                    </p>
			                                    <button type="button" class="btn btn-raised btn-warning" data-toggle="modal" data-target="#peerAdd">Add Peer</button>
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
                		<div class="col-md-6"><h5>List of Peers without Permission</h5></div>
                        
                		<div class="col text-right"><button type="button" class="btn btn-raised btn-warning" data-toggle="modal" data-target="#peerAdd">Add Peer</button></div>
                	</div>

                    @if(count($users) == 0)
                                <section class="height-70">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6 col-lg-5">
                                                <div class="card card-lg text-center" id="s">
                                                    <div class="card-body">
                                                        <i class="material-icons opacity-20 display-4">person_add</i>
                                                        <h1 class="h5">You dont have peers with permission to view map</h1>
                                                        <p>
                                                            Click view peers without permissions to view other peers.
                                                        </p>
                                                        <a href="nopermssion/peers" class="btn btn-raised btn-warning">View other peers</a>
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
                	
                    <table class="table table-borderless table-hover align-items-center">
                    	<thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-right"><a href="/peers">Show Peers with Permission</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach($users as $user)
                                        <tr class="bg-white">
                                            <th scope="row" id="card-{{$user->id}}">
                                                <a class="media align-items-center" href="#">
                                                    @if($user->informmation)
                                                        @if($user->information->gender == "Female")
                                                        <img src="{{asset('avatars/female.svg')}}" class="avatar rounded avatar-sm">
                                                        @else
                                                        <img src="{{asset('avatars/male1.svg')}}" class="avatar rounded avatar-sm">
                                                        @endif
                                                    @else
                                                        <img src="{{asset('avatars/female.svg')}}" class="avatar rounded avatar-sm">
                                                    @endif
                                                    
                                                    <div class="media-body">
                                                        <span class="h6 mb-0">{{$user->username}}</span>
                                                    </div>
                                                </a>
                                            </th>
                                            <td class="text-right"><button type="button" class="btn btn-raised btn-success addPerm" name ="{{$user->id}}">Add Permission</button>
                                            <!--<button type="button" class="btn btn-raised btn-primary editModal" data-toggle="modal" id="{{$user->id}}">Edit</button>-->
                                            <button type="button" class="btn btn-raised btn-danger" data-target="#confirmDeleteModal-{{$user->id}}" data-toggle="modal">Delete</button></td>
                                                
                                            </tr>
                                            <tr class="table-divider"></tr>
                                            @include('CRUD.users.peer_edit_modal')
                                            @include('CRUD.users.peer_delete_modal')
                                            @include('CRUD.information.permission_modal')
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
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
@include('CRUD.users.peer_add_modal')
@include('Scripts.peerAjax')
@include('Scripts.passwordRev')
<script type="text/javascript">
$(document).ready(function()
{
	$('.date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>
@endsection	