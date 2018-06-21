@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
  <div class="main">
  	<meta name="_token" content="{!! csrf_token() !!}" />
  	@include('Layouts.sidebar')
	<div class="row" style="margin-right: 0px !important">
		<div class="col" style="padding-top: 7px; margin-left: 20px;"><h5 class="font-adam">List of peers</h5></div>
		<div class="col text-right"><button type="button" class="btn btn-raised btn-warning" data-toggle="modal" data-target="#peerAdd">Add Peer</button></div>
  	</div>
  	<div class="container" style="padding-top: 10px;">
		
		<div id="peerList">	
			@foreach($users as $user)
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<img src="{{asset('avatars/male1.svg')}}" height="50px;"><p style="display: inline-block;">{{$user->information->first_name}} {{$user->information->last_name}}</p>
						</div>
						<div class="col-md-6 text-right small-center">
							<button type="button" class="btn btn-raised btn-success">Permission</button>
							<button type="button" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#editPeer-{{$user->id}}">Edit</button>
							<button type="button" class="btn btn-raised btn-danger">Delete</button>
						</div>
					</div>
				</div>	
			</div>
			<br>
		
		@include('CRUD.users.editPeer_modal')
		@endforeach
		</div>
  </div>

@include('CRUD.users.peer_add_modal')
@include('Scripts.peerAjax')
@endsection	