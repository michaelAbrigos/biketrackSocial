<script>
var friendRequest;
$(document).ready(function(){

	$(document).on('click','#addFriend',function(e){

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            f_id: $(this).val()
        }

        //console.log(formData);

        var updateURL = '/friend';
        //console.log(gen);
        $.ajax({
            type: "POST",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var btnAdd = '<div class="btn-group" style="float: right;"><button type="button" class="btn btn-raised btn-warning" disabled>Request Sent</button><button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Cancel Request</a></div></div>'
                
                $("#addFriend").replaceWith(btnAdd);

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

    friendRequest = getNotificationCount();

    setInterval(getNotificationCount,1000);
    if (friendRequest < getNotificationCount()){
        console.log(friendRequest);
    }else{
        //console.log('hello');
    }
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