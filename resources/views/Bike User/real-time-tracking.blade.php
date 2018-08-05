@extends('Layouts.master')

@section('content')

@include('Layouts.sidebar')
  
	<div class="main">  
		<div class="map-container">
		 	<div id="map"></div>
		</div>
	</div>
 
@include('Scripts.locationUpdate')
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&callback=initMap">
</script>   
</html>

@endsection
