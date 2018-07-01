<script>
$(document).ready(function(){

	$(document).on("click",'#addGroup',function(e){
        
        var id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

         e.preventDefault();

        var formData = {
            name: $('#fname-'+id).val(),
            description: $('#lname-'+id).val(),
        }

        url = '/groups/' + id;
        console.log(formData);
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            dataType: 'json',
            success: function(data){
                console.log(data);
                var options = {
                    content: "Group Added!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                $('#editPeer-'+id).modal('hide');
            },
            error: function(data){
                console.log(data);
                var options = {
                    content: "Seems there is a problem adding a group", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
            }

        });

    });

});
</script>