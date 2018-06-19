<div class="modal fade" id="persoinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form>
        <div class="modal-body">    
          	<div class="row">
          		<div class="col">
          			<div class="form-group">
  			           <label for="fname" class="col-form-label">First Name:</label>
  			           <input type="text" class="form-control" required id="fname">
  		          </div>
          		</div>
          		<div class="col">
      			 	  <div class="form-group">
  			           <label for="lname" class="col-form-label">Last Name:</label>
  			           <input type="text" class="form-control" id="lname">
  		        	</div>
          		</div>
          	</div>

            <div class="form-group">
              <label for="contact" class="col-form-label">Contact Number:</label>
              <input class="form-control" id="contact">
            </div>

  			    @if($users->gender = "Male")
      				
              <div class="form-check form-check-inline">
      	        <label for="message-text" class="col-form-label">Gender: &nbsp</label>
      			  	<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="gender1" value="male">
      			  	<label class="form-check-label" for="male">Male</label>
      			  </div>

      			  <div class="form-check form-check-inline">
      			  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender2" value="female">
      				  <label class="form-check-label" for="female">Female</label>
      			  </div>

  			    @else

      				<div class="form-check form-check-inline">
    	          <label for="message-text" class="col-form-label">Gender: &nbsp</label>
    			  	  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender1" value="male">
    			  	  <label class="form-check-label" for="male">Male</label>
      			  </div>

      			  <div class="form-check form-check-inline">
      			  	<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="gender2" value="female">
      				<label class="form-check-label" for="female">Female</label>
      			  </div>

  			   @endif
            

  		      <div class="form-group">
              <label for="recipient-name" class="col-form-label">Address:</label>
              <input type="text" class="form-control" id="address">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Birthday:</label>
              <input type="text" class="form-control" id="date">
            </div>
        </div>
        <div class="modal-footer">
        	<input type="hidden" id="ui-id" value="{{$users->id}}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="updatePI" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>