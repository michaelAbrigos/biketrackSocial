@extends('Layouts.master')
@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
 <div class="main-container">
 	
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 col-md-9 mb-1 order-md-2 table-responsive mt-3">
                	@if(count($groups)==0)
                	<section class="height-70">
		                <div class="container">
		                    <div class="row justify-content-center">
		                        <div class="col-12 col-md-6 col-lg-5">
		                            <div class="card card-lg text-center">
		                                <div class="card-body">
		                                    <i class="material-icons opacity-20 display-4">group_add</i>
		                                    <h1 class="h5">You haven't created anything yet</h1>
		                                    <p>
		                                        Start creating all types of things by hitting the button below. Let's start the journey now
		                                    </p>
		                                    <button class="btn btn-warning" id="agroup">Add Group</button>
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
                		<div class="col-md-10"><h5>List of Groups</h5></div>
                		<div class="col"><button class="btn btn-warning" id="agroup">Add Group</button></div>
                	</div>
                	
                    <table class="table table-borderless table-hover align-items-center">
                    	<thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($groups as $group)
                        	<tr class="bg-white">
                        		<th scope="row">
                                    <a class="media align-items-center" href="{{route('groups.show',$group->id)}}">
                                        <img alt="Image" src="{{asset('/icons/BTStxtOR.svg')}}" class="avatar rounded avatar-sm" />
                                        <div class="media-body">
                                            <span class="h6 mb-0">{{$group->name}}</span>
                                            <span class="text-muted">{{$group->description}}</span>
                                        </div>
                                    </a>
                                </th>
                        		<td class="text-right">
	                                <div class="dropdown">
	                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-no-arrow" type="button" id="dropdownMenuButton-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                        <i class="material-icons">menu</i>
	                                    </button>
	                                    <div class="dropdown-menu dropdown-menu-sm" aria-labelledby="dropdownMenuButton">
	                                        <a class="dropdown-item" href="#">Edit</a>
	                                        <div class="dropdown-divider"></div>
	                                        <a class="dropdown-item" href="#" id="{{$group->id}}">Delete</a>
	                                    </div>
	                                </div>
	                            </td>
                        	</tr>
                        	<tr class="table-divider"></tr>
                        	@endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center pb-2">
                    {{ $groups->links() }}
                    </div>
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
 @include('CRUD.groups.group_add_modal')
 @include('CRUD.groups.group_noFriends_modal')
 <script type="text/javascript" src="{{asset('js/group.js')}}"></script>
 @endsection