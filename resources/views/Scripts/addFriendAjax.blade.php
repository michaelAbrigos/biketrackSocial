<script>
var friendRequest;
$(document).ready(function(){

	$(document).on('click','.addFriend',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            f_id: $(this).val()
        }

        var RequestedID = e.target.id; //getID of Button
        //console.log(RequestedID);

        var updateURL = '/friends';
        //console.log(gen);
        $.ajax({
            type: "POST",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var btnAdd = '<div class="btn-group" style="float: right;"><button type="button" class="btn btn-raised btn-warning" disabled>Request Sent</button><button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button><div class="dropdown-menu"><a class="dropdown-item" href="#" value="'+RequestedID+'">Cancel Request</a></div></div>'
                
                $('#'+RequestedID).replaceWith(btnAdd);

                var options =  {
                    content: "Friend Request Sent!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                
            },
            error: function (data) {
                var options =  {
                    content: "Can't sent a request at the moment", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                console.log('Error:', data);
            }

        });
	});

    $(document).on('click','#confirmFriend',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 
        var friend_id = $(this).val();
        var formData = {
            f_id: $(this).val()
        }

        console.log(formData);

        var updateURL = '/confirmFriend';
        //console.log(gen);
        $.ajax({
            type: "POST",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {

                var options =  {
                    content: "Friend Request Confirmed!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                setTimeout(function(){// wait for 1 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
                
            },
            error: function (data) {
                var options =  {
                    content: "Can't accept this request at the moment", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                console.log('Error:', data);
            }

    });
    });

    $(document).on('click','#declineFriend',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 
        var friend_id = $(this).val();
        var formData = {
            f_id: $(this).val()
        }

        var updateURL = 'friends/declineFriend/'+friend_id;
        //console.log(gen);
        $.ajax({
            type: "POST",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var btnAdd = '<button type="button" class="btn btn-raised btn-warning" id="addFriend" value="" style="float: right;">Add Friend</button>'
            },
            error: function (data) {
                console.log('Error:', data);
            }

        });
    });

    $(document).on('click','#cancelRequest',function(e){

    });

    $(document).on('click','.unfriendConfirm',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var RequestedID = e.target.id;
        var updateURL = 'friends/'+RequestedID;
        console.log(updateURL);
        $.ajax({
            type: "DELETE",
            url: updateURL,
            data: "",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var options =  {
                    content: "Friend removed", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                setTimeout(function(){// wait for 1 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
                
            },
            error: function (data) {
                var options =  {
                    content: "Can't make a request at the moment", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                console.log('Error:', data);
            }

        });

    });

});


function getNotificationCount(){
    $.ajax({
        type: "GET",
        url: '/countFriendNotifications',
        data: {},
        dataType: 'json',
        success: function (data) {
            return data;
        },
        error: function (data) {
            return false;
        }

    });
}

function getNotification(){
    $.ajax({
        type: "GET",
        url: '/getFriendNotifsAjax',
        data: {},
        dataType: 'json',
        success: function (data) {
           
        },
        error: function (data) {
            return false;
        }

    });
}

</script>