@extends('Layouts.master')
@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
<div class="main-container">
 	<div class="container mt-2">
        <div class="row">
        	<div class="col-12 col-md-9 mb-1 order-md-2 mt-3">
				<div class="card card-sm">
                    <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Real Time Location</h6>
                        </div>
                    </div>
                    <div class="list-group list-group-flush" style="height: 420px;">
                        <div id="map"></div>
                        <div id="infowindow-content">
					      <img src="" width="16" height="16" id="place-icon">
					      <span id="place-name"  class="title" style="font-weight: bold"></span><br>
					      <span id="place-address"></span>
					    </div>
                    </div>
                </div>
        	</div>
        	<div class="col-12 col-md-3 mb-1 order-md-1 mt-3">
        		<div class="card">
        			<div class="card-header text-white nav-color">
				        <span class="h6">Enter Location</span>
				    </div>
        			<form>
        				<div class="list-group list-group-flush">
	                		<div class="form-group justify-content-between list-group-item" id="pac-card">
	                            <input type="text" placeholder="Start Location" value="Your Location" id="start" name="start" class="form-control form-control-lg" required/>
	                        </div>
	                    	<div class="form-group justify-content-between list-group-item">
	                            <input type="text" placeholder="Destination" name="end" id="end" class="form-control form-control-lg" required />
	                        </div>
	                        				
                        </div>	 	
        			</form>
        		</div>
        		<div class="card">
        			<div class="card-header text-white nav-color">
				        <span class="h6">Route Information</span>
				    </div>
        			<form>
        				<div class="list-group list-group-flush">
	                		<p class="list-group-item">Distance</p>
	                    	<p class="list-group-item">Time</p>	
                        </div>	 	
        			</form>
        		</div>
	            
	        </div>
        </div>
    </div>
 </div>
 <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&libraries=places&callback=initMap">
</script> 
<script type="text/javascript" src="{{asset('/js/ride.js')}}"></script>
 @endsection