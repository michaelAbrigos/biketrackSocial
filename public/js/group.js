var groupmembers = [];
var friends;
$(document).ready(function(){

    loadMembers();

    $(document).on('click','#agroup',function(e){
        if($('#memberSelect').has('option').length >= 1){
            console.log(groupmembers);
            for (var i = 0; i < groupmembers.length; i++) {
                $('small#'+groupmembers[i]).remove();
            }
            $('#addGroup').modal('show');
        }else{
            $('#noFriends').modal('show');
        }
        
    });

    $(document).on('click','#closeModal',function(e){
        loadMembers();
        $('#name').val() == "";
        $('#description').val() == "";
        $('#addGroup').modal('hide');

        
    });



	$(document).on("click",'#createGroup',function(e){
        
        var id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

         e.preventDefault();

        var formData = {
            name: $('#name').val(),
            description: $('#description').val(),
            members: groupmembers
        }

        url = '/groups/';
        //console.log(formData);
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            dataType: 'json',
            success: function(data){
                //console.log(data);
                var options = {
                    content: "Group Added!", // text of the snackbar
                    style: "toast", // add a custom class to your snackbar
                    timeout: 2000 // time in milliseconds after the snackbar autohides, 0 is disabled
                }
                $.snackbar(options);
                $('#addGroup').modal('hide');
                setTimeout(function(){// wait for 1 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
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

    $(document).on("click",'#add',function(e){
        $('#addedMember').append('<small id="'+$('#memberSelect').find('option:selected').val()+'"><span class="groupmember" id="'+ $('#memberSelect').find('option:selected').attr("name")+'"><a class="remove" id="'+$('#memberSelect').find('option:selected').val()+'">'+ $('#memberSelect').find('option:selected').attr("name")+' </a><i class="material-icons removemember">close</i></span></small>')
        groupmembers.push($('#memberSelect').find('option:selected').val());
        //console.log(groupmembers);
        $('#memberSelect option:selected').remove();
    });

    $(document).on("click",'.remove',function(e){
        $('#memberSelect').append('<option name="'+ $(this).text() +'" value="'+$(this).attr('id')+'">' + $(this).text() +  '</option>');
        groupmembers = groupmembers.filter(item => item !== $(this).attr('id'));
        var id = $(this).attr('id');
        //console.log(groupmembers);
        $('small#'+id).remove();
    });

});

function loadMembers(){
    $('#memberSelect').empty();

    $.ajax({
        type: "GET",
        url: "/friend/autocomplete",
        data: "",
        success: function(data){
            $.each(data,function(i,d){
                //alert(d.information.first_name  + d.information.last_name);
                $('#memberSelect').append('<option name="'+d.information.first_name + ' ' +  d.information.last_name+'" value="' + d.id + '">' + d.information.first_name + ' '+  d.information.last_name+ '</option>');
            });
        }
    });
}

