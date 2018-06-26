@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
  <div class="main">
  	<meta name="_token" content="{!! csrf_token() !!}" />
  	@include('Layouts.sidebar')
	<div class="row" style="margin-right: 0px !important">
		<div class="col" style="padding-top: 7px; margin-left: 20px;"><h5 class="font-adam">Group list</h5></div>
		<div class="col text-right"><button type="button" class="btn btn-raised btn-warning" data-toggle="modal" data-target="#addGroup">Add Group</button></div>
  	</div>

  	<div class="container" style="padding-top: 10px;">
		<div class="alert alert-secondary" role="alert">
	  		Looks like you don't have any groups!
		</div>
	</div>
  </div>
 @include('CRUD.groups.group_add_modal')
 @endsection