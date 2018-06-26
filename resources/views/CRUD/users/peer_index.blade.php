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
		@if(count($users) == 0)
		<div class="alert alert-secondary" id="noPeer" role="alert">
		  Looks like you dont have any peers!
		</div>
		@else
			<div id="peerList">	
				@foreach($users as $user)
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								@if($user->information->gender == "Female")
								<img src="{{asset('avatars/female.svg')}}" height="50px;">
								@else
								<img src="{{asset('avatars/male1.svg')}}" height="50px;">
								@endif
								<p style="display: inline-block;">{{$user->information->first_name}} {{$user->information->last_name}}</p>
							</div>
							<div class="col-md-6 text-right small-center">
								<button type="button" class="btn btn-raised btn-success">Permission</button>
								<button type="button" class="btn btn-raised btn-primary editModal" data-toggle="modal" id="{{$user->id}}">Edit</button>
								<button type="button" class="btn btn-raised btn-danger">Delete</button>
							</div>
						</div>
					</div>	
				</div>
				<br>
			
			@include('CRUD.users.peer_edit_modal')
			@endforeach
			</div>
		@endif

  </div>

@include('CRUD.users.peer_add_modal')
@include('Scripts.peerAjax')
<script type="text/javascript">
$(document).ready(function()
{
	$('.date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>
@endsection	