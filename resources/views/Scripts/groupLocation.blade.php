<script>		
var map,infoWindow;
var newLocation = [];
var position1 = {};
var markers = [];
var numDeltas = 100;
var delay = 10; //milliseconds
var i = 0;
var deltaLat;
var deltaLng;

function callback(response){
    //console.log(response);
    position1 = response;
}

function initMap() {

var startplace = {lat: 14.5176, lng: 121.0509}
var map = new google.maps.Map(
    document.getElementById('map'), 
    {zoom: 16, center: startplace}
);

    $.ajax({
          type:"GET",
          url:"/getLocation/groups/{{$id}}",
          data: "",
          dataType: 'json',
          success: function(data){
            //console.log($.trim(data));
            if(!data){
                infoWindow = new google.maps.InfoWindow;

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                      lat: position.coords.latitude,
                      lng: position.coords.longitude
                    };
                    callback(pos);

                    var marker = new google.maps.Marker({position: pos, map: map});
                    markers.push(marker);
                    //infoWindow.open(map);
                    map.setCenter(pos);
                  }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                  });
                } else {
                  // Browser doesn't support Geolocation
                  handleLocationError(false, infoWindow, map.getCenter());
                }
            
                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
                    infoWindow.open(map);
                }
          }else{
            //console.log(data);
            countMembers = data[0].length;
            //console.log(data[0][0].latitude);
            for (var i = 0; i < countMembers; i++) {
              newLocation.push({lat:data[0][i].latitude,lng:data[0][i].longitude}); 
            }
            console.log(newLocation);
            var myLocation = {lat: data.latitude, lng: data.longitude};
            for (var i = 0; i < newLocation.length; i++) {
              var marker = new google.maps.Marker({position: newLocation[i], map: map});
              markers.push(marker);
            }
            
            //var latLng = marker.getPosition(); // returns LatLng object
            //map.setCenter(latLng);
          }  
        }
    });

    setInterval(function(){ 
        //console.log(pos);
    	//clearMarkers();

        $.ajax({
          type:"GET",
          url:"/getLocation/groups/{{$id}}",
          data: "",
          dataType: 'json',
          success: function(data)
          {

            if(!data){
                infoWindow = new google.maps.InfoWindow;

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                    transition(position1);
                    console.log(position1.lat,position1.lng);
                    map.setCenter(new google.maps.LatLng(position1.lat, position1.lng));
                  }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                  });
                } else {    
                  // Browser doesn't support Geolocation
                  handleLocationError(false, infoWindow, map.getCenter());
                }
            
                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
                    infoWindow.open(map);
                }
          }else{
            clearMarkers();
          	var myLocation = {lat: data.latitude , lng: data.longitude};
            var marker = new google.maps.Marker({position: myLocation, map: map});
            markers.push(marker);
            marker.setMap(map);
    		    //console.log(map);  
          }}
        });

        //intervals for refresh and get request.
    }, 10000);

}

function transition(result){
    i = 0;
    deltaLat = (result[0] - position1[0])/numDeltas;
    deltaLng = (result[1] - position1[1])/numDeltas;
    moveMarker();
}

function moveMarker(){
    var myLocation = {lat:position1[0] += deltaLat,lng:position1[1] += deltaLng}
    //var latlng = new google.maps.LatLng(position[0], position[1]);
    var marker = new google.maps.Marker({position: myLocation, map: map});
    //marker.setTitle("Latitude:"+position[0]+" | Longitude:"+position[1]);
    //marker.setPosition(latlng);
    if(i!=numDeltas){
        i++;
        setTimeout(moveMarker, delay);
    }
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