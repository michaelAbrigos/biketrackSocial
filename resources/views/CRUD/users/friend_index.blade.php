@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
  <div class="main">
  	@include('Layouts.sidebar')
	<div class="row" style="margin-right: 0px !important">
		<div class="col" style="padding-top: 7px; margin-left: 20px;"><h5>List of friends</h5></div>
  	</div>
  	<div class="container" style="padding-top: 10px;">
		@if(count($users) == 0)
		<div class="alert alert-warning" id="noPeer" role="alert">
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
								<button type="button" class="btn btn-raised btn-success">View</button>
								<button type="button" class="btn btn-raised btn-danger">Unfriend</button>
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