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
var markerArray = [];

function callback(response){
    //console.log(response);
    position1 = response;
}

function initMap() {

var startplace = {lat: 14.5176, lng: 121.0509}
var map = new google.maps.Map(
    document.getElementById('map'), 
    {zoom: 14, center: startplace}
);

    $.ajax({
          type:"GET",
          url:"/getLocation/groups/{{$id}}",
          data: "",
          dataType: 'json',
          success: function(data){
            //console.log($.trim(data));
            if(!data){
                
            }else{
            //console.log(data[0]);
            $.each(data[0],function(index){
                //console.log(data[0][index].latitude);
                var myLocation = {lat: data[0][index].latitude , lng: data[0][index].longitude};
                var marker = new google.maps.Marker({position: myLocation, map: map});
                markerArray.push(marker);
                marker.setMap(map);
              });
                
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
                 
            }else{
            clearMarkers();
            	$.each(data[0],function(index){
                //console.log(data[0][index].latitude);
                var myLocation = {lat: data[0][index].latitude , lng: data[0][index].longitude};
                var marker = new google.maps.Marker({position: myLocation, map: map});
                markerArray.push(marker);
                marker.setMap(map);
              });
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