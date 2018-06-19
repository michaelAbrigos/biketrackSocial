<script>		
var map;
var markers = [];
    
function initMap() {

var startplace = {lat: 14.5176, lng: 121.0509}
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
        var latLng = marker.getPosition(); // returns LatLng object
        map.setCenter(latLng)
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
      	var myLocation = {lat: data.latitude , lng: data.longitude};
        var marker = new google.maps.Marker({position: myLocation, map: map});
        markers.push(marker);
        marker.setMap(map);
		    //console.log(map);  
      }
    });

    //intervals for refresh and get request.
}, 10000);
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