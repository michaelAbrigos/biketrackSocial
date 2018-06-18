<script>		
var map;
var markers = [];
    
function initMap() {
var startplace = {lat: 14.560996, lng: 121.046310}
var map = new google.maps.Map(
	document.getElementById('map'), {zoom: 16, center: startplace});
$.ajax({
      type:"GET",
      url:"/getLocation",
      data: "",
      dataType: 'json',
      success: function(data)
    	{
	      	var myLocation = {lat: data.latitude, lng: data.longitude};
			var marker = new google.maps.Marker({position: myLocation, map: map});
			markers.push(marker);
		}
});

setInterval(function()
{ 
	clearMarkers();

    $.ajax({
      type:"GET",
      url:"/getLocation",
      data: "",
      dataType: 'json',
      success: function(data)
      {
      	//console.log(markers);
      	//gonna change this to /getlocation with user id latest data
      	var myLocation = {lat: 14.560995, lng: 121.046410};
        var marker = new google.maps.Marker({position: myLocation, map: map});
        markers.push(marker);
        marker.setMap(map);
		      
      }
    });

    //intervals for refresh and get request.
}, 60000);
}

  function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  // Removes the markers from the map, but keeps them in the array.
  function clearMarkers() {
    setMapOnAll(null);
    markers = [];
  }

</script>