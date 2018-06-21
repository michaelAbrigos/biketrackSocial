<script>
$(document).ready(function(){

	var id = $('#user-id').val();

	$(document).on("click",'#pi-b',function(){
		
		//console.log(id);
		$.get(url + '/' + id +'/edit', function (data) {
            //success data
            //console.log(data);
            $('#fname').val(data.first_name);
            $('#lname').val(data.last_name);
            $('#contact').val(data.contact_number);
            $('#address').val(data.home_address);
            $('#date').val(data.birthday);
            $('#persoinfo').modal('show');
        }) 
	});

    $(document).on("click",'#addPeer',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        if ($('#gender1').is(":checked")){
            var gen = "Male";
        }else{
            var gen = "Female";
        }

        var formData = {
            first_name: $('#fname').val(),
            last_name: $('#lname').val(),
            username: $('#username').val(),
            gender: gen,
            email: $('#email').val(),
            password: $('#pass').val(),
        }
        console.log(formData);
        
        url = '/peers';

       $.ajax({
            type: "POST",
            url: url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var peerContainer = '<div class="card"><div class="card-body"><div class="row"><div class="col-md-6">';
                peerContainer += '<img src="{{asset('avatars/male1.svg')}}" height="50px;"><p style="display: inline-block;">'+data.first_name+' '+data.last_name+'</p></div>';
                peerContainer += '<div class="col-md-6 text-right small-center"><button type="button" class="btn btn-raised btn-success">Permission</button>';
                peerContainer+= '<button type="button" class="btn btn-raised btn-primary" data-toggle="modal" id="pi-b" data-target="#editPeer-'+data.id+'">Edit</button><button type="button" class="btn btn-raised btn-danger">Delete</button></div>';
                peerContainer += '</div></div></div><br>';

                $("#peerList").append(peerContainer);
                
                $('#peerAdd').modal('hide');

                var options =  {
                    content: "Peer Added!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                
            },
            error: function (data) {
                var options =  {
                    content: "Seems there  is a problem adding a peer", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                console.log('Error:', data);
            }
     });
    });
});
</script>