setInterval(function(){ 
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        
            var formData = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
            }

            $.ajax({
                type:"POST",
                url:"saveLocationforHistory",
                data: formData,
                dataType: 'json',
                success: function(data){
                    console.log(data);   
                },error: function(data){
                    console.log(data);
                }
            });

        }, function error(msg) {
          
        });
    } else {    
        // Browser doesn't support Geolocation
       
    }

    //intervals for refresh and get request.
}, 120000);