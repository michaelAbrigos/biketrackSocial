<script>
$(document).ready(function(){

	var url = '/account'
	var id = $('#btnvert').val();



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
	})

    $(document).on("click",'#ai-b',function(){
        
        //console.log(id);
        $.get(url + '/getUsernameEmail', function (data) {
            //success data
            //console.log(data);
            $('#username').val(data.username);
            $('#email').val(data.email);
            $('#accountinfo').modal('show');
        }) 
    })

    $(document).on("click",'#ch-pass',function(){
        $('#changePass').modal('show');
    })

    $(document).on("click","#submitDevice",function(e){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 
        //console.log($('#code').val());
        var formData = {
            code: $('#code').val()
        }

        var updateURL = '/device';
        //console.log(gen);
        $.ajax({
            type: "POST",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var Device = ' <b><p id="d_code">Device Name:</b>'+ data.device_name +'</p><b><p id="d_code">Device Code:</b> '+data.device_code;
                
                $("#d_code").replaceWith(Device);
                
                $('#deviceAdd').modal('hide');

                var options =  {
                    content: "Device Added!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                
            },
            error: function (data) {
                var options =  {
                    content: "Seems there  is a problem adding your device", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                //console.log('Error:', data);
            }

    });


});

	$(document).on("click","#updatePI",function(e){
		
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

		var ui_id = $('#ui-id').val();
		//console.log(ui_id);

        var formData = {
            first_name: $('#fname').val(),
            last_name: $('#lname').val(),
            birthday : $('#date').val(),
            gender: gen,
            contact_number: $('#contact').val(),
            home_address: $('#address').val(),
        }

        var options =  {
		    content: "Account Updated!", // text of the snackbar
		    style: "toast", // add a custom class to your snackbar
		    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
		}

		$.snackbar(options);
        
        var updateURL = url + '/' + ui_id;
        //console.log(gen);
        $.ajax({
            type: "PUT",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var titlefname = '<h3 id="titleFname">'+ data.first_name +' '+ data.last_name +'</h3>';
            	var fname = '<b><p id="p_fname">First Name:</b> '+ data.first_name +'</p>';
            	var lname = '<b><p id="p_lname">Last Name:</b> '+ data.last_name +'</p>';
            	var contact = '<b><p id="p_contact">Contact Number:</b> '+ data.contact_number +'</p>';
            	var address = '<b><p id="p_address">Address:</b> '+ data.home_address +'</p>';
            	var gender = '<b><p id="p_gender">Gender:</b> '+ data.gender +'</p>';
            	var bday = '<b><p id="p_bday">Birthday:</b> '+ data.birthday +'</p>';
            	
                $("#titleFname").replaceWith(titlefname);
            	$("#p_fname").replaceWith(fname);
            	$("#p_lname").replaceWith(lname);
            	$("#p_contact").replaceWith(contact);
            	$("#p_address").replaceWith(address);
            	$("#p_gender").replaceWith(gender);
            	$("#p_bday").replaceWith(bday);
            	
            	$('#persoinfo').modal('hide');
            	
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
	});

    //change select option on load
    if($('meta[name="_token"]').val() == "Male"){
         $('select').find('option[value=Male]').attr('selected','selected');
    }else{
         $('select').find('option[value=Female]').attr('selected','selected');
    }

});

$('input[name="fname"],input[name="lname"],input[name="username"],input[name="email"]').change(function(){
    if($(this).val()){
        console.log($(this).val());
        $('button[name="submit"]').prop("disabled",false);
    }else{
        $('button[name="submit"]').prop("disabled",true);
    }
});



</script>