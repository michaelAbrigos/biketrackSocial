var newLocation = [];
var position1 = {};
var markerArray = [];

function callback(response){
    //console.log(response);
    position1 = response;
}

function initMap() {
	var startplace = {lat: 14.5176, lng: 121.0509};
    var map = new google.maps.Map(document.getElementById('map'), {
      center: startplace,
      zoom: 13
    });

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(map);
    var stepDisplay = new google.maps.InfoWindow;

    $.ajax({
          type:"GET",
          url:"/getLocation",
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
                    markerArray.push(marker);
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
            clearMarkers();
          	var myLocation = {lat: data.latitude , lng: data.longitude};
            position1 = myLocation;
            var marker = new google.maps.Marker({position: myLocation, map: map});
            markerArray.push(marker);
            marker.setMap(map);
          }  
        }
    });

    var input = document.getElementById('start');
    var input2 = document.getElementById('end');
    var option = {componentRestrictions: {country: 'PH'}};

    var autocomplete = new google.maps.places.Autocomplete(input,option);
    var autocomplete2 = new google.maps.places.Autocomplete(input2,option);

    autocomplete.bindTo('bounds', map);
    autocomplete2.bindTo('bounds',map);

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
      map: map,
      anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete2.addListener('place_changed', function() {
        clearMarkers();
        calculateAndDisplayRoute(directionsService, directionsDisplay,markerArray,stepDisplay,map); 
    });

}

function calculateAndDisplayRoute(directionsService, directionsDisplay,markerArray,stepDisplay,map) {
	
	if(document.getElementById('start').value == "Your Location"){
		var startPlace = position1;
	}else{
		var startplace = document.getElementById('start').value;
	}

	directionsService.route({
	  origin: startplace,
	  destination: document.getElementById('end').value,
	  travelMode: 'WALKING'
	}, function(response, status) {
	  if (status === 'OK') {
      directionsDisplay.setDirections(response);
      showSteps(response, markerArray, stepDisplay, map);
	  } else {
	    window.alert('Directions request failed due to ' + status);
	  }
	});
}

function showSteps(directionResult, markerArray, stepDisplay, map) {
  // For each step, place a marker, and add the text to the marker's infowindow.
  // Also attach the marker to an array so we can keep track of it and remove it
  // when calculating new routes.
  var myRoute = directionResult.routes[0].legs[0];
  for (var i = 0; i < myRoute.steps.length; i++) {
    var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
    marker.setMap(map);
    marker.setPosition(myRoute.steps[i].start_location);
    attachInstructionText(
        stepDisplay, marker, myRoute.steps[i].instructions, map);
  }
}

function attachInstructionText(stepDisplay, marker, text, map) {
  google.maps.event.addListener(marker, 'click', function() {
    // Open an info window when the marker is clicked on, containing the text
    // of the step.
    stepDisplay.setContent(text);
    stepDisplay.open(map, marker);
  });
}

function setMapOnAll(map) {
  for (var i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
  markerArray = [];
}