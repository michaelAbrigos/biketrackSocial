<script>
$(document).ready(function(){

    $(document).on("click",'.editModal',function(){
        var id = $(this).attr('id');
        var url = 'peers';

        $.get(url + '/' + id, function (data) {
            //success data
            //console.log(data.first_name);
            $('#fname-'+id).val(data.first_name);
            $('#lname-'+id).val(data.last_name);
            $('#contact-'+id).val(data.contact);
            $('#address-'+id).val(data.address);
            $('#gender-'+id).val(data.gender).change();
            $('#date-'+id).val(data.birthday);
            $('#editPeer-'+id).modal('show');
        }) 

    });

    $(document).on("click",'.updatePeer',function(e){
        
        var id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

         e.preventDefault();

        var formData = {
            first_name: $('#fname-'+id).val(),
            last_name: $('#lname-'+id).val(),
            contact: $('#contact-'+id).val(),
            gender: $('#gender-'+id).find(":selected").text(),
            address: $('#address-'+id).val(),
            birthday: $('#date-'+id).val(),
        }

        url = '/peers/' + id;
        console.log(formData);
        $.ajax({
            type: "PUT",
            url: url,
            data: formData,
            dataType: 'json',
            success: function(data){
                console.log(data);
                var options = {
                    content: "Peer Information Updated!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                $('#editPeer-'+id).modal('hide');
            },
            error: function(data){
                console.log(data);
                var options = {
                    content: "Seems there is a problem adding a peer", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
            }

        });

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
        //console.log(formData);
        
        url = '/peers';

       $.ajax({
            type: "POST",
            url: url,
            data: formData,
            dataType: 'json',
            success: function (data) {
/*                if($('#noPeer').length){
                    $("#noPeer").remove();
                    var peerContainer = '<div id="peerList"><div class="card"><div class="card-body"><div class="row"><div class="col-md-6">';
                    peerContainer += '<img src="{{asset('avatars/male1.svg')}}" height="50px;"><p style="display: inline-block;">'+data.first_name+' '+data.last_name+'</p></div>';
                    peerContainer += '<div class="col-md-6 text-right small-center"><button type="button" class="btn btn-raised btn-success">Permission</button>';
                    peerContainer+= '<button type="button" class="btn btn-raised btn-primary" data-toggle="modal" id="pi-b" data-target="#editPeer-'+data.id+'">Edit</button><button type="button" class="btn btn-raised btn-danger">Delete</button></div>';
                    peerContainer += '</div></div></div><br></div>';
                    $(".container").append(peerContainer);
                }else{
                    var peerContainer = '<div class="card"><div class="card-body"><div class="row"><div class="col-md-6">';
                    peerContainer += '<img src="{{asset('avatars/male1.svg')}}" height="50px;"><p style="display: inline-block;">'+data.first_name+' '+data.last_name+'</p></div>';
                    peerContainer += '<div class="col-md-6 text-right small-center"><button type="button" class="btn btn-raised btn-success">Permission</button>';
                    peerContainer+= '<button type="button" class="btn btn-raised btn-primary" data-toggle="modal" id="pi-b" data-target="#editPeer-'+data.id+'">Edit</button><button type="button" class="btn btn-raised btn-danger">Delete</button></div>';
                    peerContainer += '</div></div></div><br>';
                    $("#peerList").append(peerContainer);

                }*/
                
                
                
                $('#peerAdd').modal('hide');

                var options =  {
                    content: "Peer Added!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
            },
            error: function (data) {
                var message = data.responseJSON.message;
                var duplicateEmail =  'SQLSTATE[23000]';
                
                //console.log(message.indexOf(duplicateEmail));
                
                //this code will check if duplicate email is in data.responseJSON.message
                if(message.indexOf(duplicateEmail) >= 0){
                    var con = "Email already been taken";
                }else{
                    var con = message;
                }
                var options =  {
                    content: con, // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                console.log('Error:', data);
            }
     });
    });

    $(document).on('click','.deletePeerConfirm',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var RequestedID = e.target.id;
        var updateURL = 'peers/'+RequestedID;
        //console.log(gen);
        $.ajax({
            type: "DELETE",
            url: updateURL,
            data: "",
            dataType: 'json',
            success: function (data) {
                var options =  {
                    content: "Peer removed", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);

                setTimeout(function(){// wait for 5 secs(2)
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
</script>