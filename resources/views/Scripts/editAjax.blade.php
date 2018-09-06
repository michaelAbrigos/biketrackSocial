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

    $(document).on("click","#deviceCode",function(e){
        
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
        console.log(formData);
        $.ajax({
            type: "POST",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
            
                var options =  {
                    content: "Device Added!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                setTimeout(function(){// wait for 1 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
                
            },
            error: function (data) {
                console.log(data)
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

	$(document).on("click","#submitProfile",function(e){
		
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
		console.log(ui_id);

        var formData = {
            first_name: $('#first-name').val(),
            last_name: $('#last-name').val(),
            birthday : $('#date').val(),
            gender: gen,
            contact_number: $('#contact').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            zip_code: $('#zipcode').val(),
            about_me: $('#about-me').val(),
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
                console.log(data);
                setTimeout(function(){// wait for 1 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
            
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    

    $(document).on("click","#submitAccount",function(e){
		
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

		var ui_id = $('#ui-id1').val();
	

        var formData = {
            username:$('#username').val(), 
        }

        var options =  {
		    content: "Account Updated!", // text of the snackbar
		    style: "toast", // add a custom class to your snackbar
		    timeout: 1500 // time in milliseconds after the snackbar autohides, 0 is disabled
		}

		$.snackbar(options);
        
        var updateURL = 'accountInfo/' + ui_id;
        //console.log(gen);
        $.ajax({
            type: "PUT",
            url: updateURL,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                setTimeout(function(){// wait for 1 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
	});


});

$('input[name="fname"],input[name="lname"],input[name="username"],input[name="email"]').change(function(){
    if($(this).val()){
        console.log($(this).val());
        $('button[name="submit"]').prop("disabled",false);
    }else{
        $('button[name="submit"]').prop("disabled",true);
    }
});

$('input[name="bday"],input[name="address"],input[name="city"],input[name="zip_code"]','input[name="contact"]').change(function(){
    if($(this).val()){
        console.log($(this).val());
        $('button[name="saveInfo"]').prop("disabled",false);
    }else{
        $('button[name="saveInfo"]').prop("disabled",true);
    }
});


$('input[name="code"]').change(function(){
    if($(this).val()){
        console.log($(this).val());
        $('button[name="addDev"]').prop("disabled",false);
    }else{
        $('button[name="addDev"]').prop("disabled",true);
    }
});

</script>