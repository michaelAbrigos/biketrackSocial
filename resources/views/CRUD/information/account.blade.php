@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
  <div class="card bg-light mb-3" style="margin: 15px;">
    <div class="card-header header-color">
      <div class="row">
   	 	  <div class="col-md-1 col-sm-12 image-div">
   	 			<center><img src="{{asset('avatars/male1.svg')}}" height="100px"></center>
   	 		</div>
   	 		<div class="col-md-4 col-sm-12 name-div">
 	 				<h3 id="titleFname">{{ $users->first_name." ".$users->last_name }}</h3>
 	 				<h5>({{ $users->user->username }})</h5>
   	 		</div>
   	 	</div>
   	</div>
    <div class="card-body">
      <h5 class="card-title">Account Settings</h5>
      <div id="accordion">
        <div class="card">
          <div class="card-header card-head-color" id="headingOne">
            <div class="row">
      	       <div class="col-md-8 tab-title">
	               <h5 class="mb-0">
          	        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          	          Personal Information
          	        </button>
        	       </h5>
      	       	</div>
              	<div class="col-md-4 menu-div">
              		<div class="dropdown">
	        				  <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="btnvert" data-toggle="dropdown" aria-haspopup="true" value="{{$users->user_id}}" aria-expanded="false">
	        				    <i class="material-icons">more_vert</i>
	        				  </button>
	        				  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
	        				    <a class="dropdown-item" href="#" data-toggle="modal" id="pi-b" data-target="#persoinfo"><i class="material-icons">edit</i> &nbsp Edit</a>
	        				  </div>
        					</div>
              	</div>
      			</div>
  				</div>
		    	<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
		      	<div class="card-body">
			        <p id="p_fname"><b>First Name:</b> {{ $users->first_name }}</p>
			        <p id="p_lname"><b>Last Name:</b> {{ $users->last_name }}</p>
			        <p id="p_gender"><b>Gender:</b> {{ $users->gender }}</p>
			        <p id="p_contact"><b>Contact Number:</b> {{ $users->contact_number }}</p>
			        <p id="p_bday"><b>Birthday:</b> {{ $bday }}</p>
			        <p id="p_address"><b>Address:</b> {{ $users->home_address }}</p>
		      	</div>
		  		</div>
		  	</div>
  			<div class="card">
    			<div class="card-header card-head-color" id="headingTwo">
      			<div class="row">
      				<div class="col-md-8 tab-title">
      					<h5 class="mb-0">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          Account Information
					        </button>
      					</h5>
  						</div>
  						<div class="col-md-4 menu-div">
			      		<div class="dropdown">
								  <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <i class="material-icons">more_vert</i>
								  </button>
								  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
								    <a class="dropdown-item" href="#" data-toggle="modal" value="{{$users->user_id}}" data-target="#accountinfo"><i class="material-icons">edit</i> &nbsp Edit</a>
								  </div>
								</div>
      				</div>
      			</div>
    			</div>
    			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      			<div class="card-body">
			        <p><b>Username:</b>Abri</p>
			        <p><b>Email:</b> michael.abrigos27@gmail.com</p>
			        <p><b>Password: *******</b> </p>
      			</div>
    			</div>
  			</div>
  			<div class="card">
    			<div class="card-header card-head-color" id="headingThree">
      			<h5 class="mb-0">
			        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          Device Information
			        </button>
      			</h5>
    			</div>
    			<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
      			<div class="card-body">
			        @if(count($devices) == 0)
			        No added device!
			        <a href="#" data-toggle="modal" data-target="#deviceAdd">Add Devices</a>
			        
			        @else
			        
			        @foreach($devices as $device)
			         <p id="d_code"><b>Device Name:</b> {{ $device->device_name }}</p>
			         <p id="d_code"><b>Device Code:</b> {{ $device->device_code }}</p>
			        @endforeach
			       
			        @endif
      			</div>
    			</div>
  			</div>
			</div>
		</div>
	</div>
@include('CRUD.information.personal_info_modal')
@include('CRUD.information.account_info_modal')
@include('CRUD.information.device_info_modal')
@include('Scripts.editAjax')
<script type="text/javascript">
$(document).ready(function()
{
	$('#date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>

@endsection
