@extends('Layouts.master')
@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
<div class="main-container">
    <section class="space-sm">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 mb-1 order-md-2">
                    <div class="card card-sm">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <div>
                                <h6>{{$curGroup->name}} Real Time Location</h6>
                                <small class="text-muted"></small>
                            </div>
                        
                        </div>
                        <div class="list-group list-group-flush" style="height: 420px;">
                            <div id="map"></div>
                        </div>
                    </div>

                </div>
                <!--end of col-->
                <div class="col-12 col-md-3 mb-1 order-md-1">
                   
                    <div class="card card-sm">
                    	<div class="card-header nav-color text-white">
					        <span class="h6">Group Members</span>
					    </div>
					    <div class="list-group list-group-flush">
					        @foreach($information as $member)
					        <div class="list-group-item d-flex justify-content-between">
								
	                                
	                                <p class="" for="custom-switch-{{$member->id}}">{{$member->information->first_name}} {{$member->information->last_name}}</p>
	                            
		  					</div>		
	  						@endforeach            
					    </div>
                    </div>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>     
</div>
@include('Scripts.groupLocation')
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&callback=initMap">
</script
@endsection
