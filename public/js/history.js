var map;

function initMap() {
	var startplace = {lat: 14.5176, lng: 121.0509};
    var map = new google.maps.Map(document.getElementById('map'), {
      center: startplace,
      zoom: 13
    });
}

var submit = document.getElementById('submit');

submit.addEventListener('click',function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    e.preventDefault(); 

    var formData = {
        start: $('#start').val(),
        end: $('#end').val(),
    }

    $.ajax({
        type:"POST",
        url : "/history",
        data: formData,
        datatype: 'json',
        success: function(data){
            console.log(data);
        },error: function(data){
            console.log(data);
        }
    })
});

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