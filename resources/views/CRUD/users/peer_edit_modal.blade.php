<div class="modal fade" id="editPeer-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  			           <input type="text" class="form-control" required id="fname-{{$user->id}}">
  		          </div>
          		</div>
          		<div class="col">
      			 	  <div class="form-group">
  			           <label for="lname" class="col-form-label">Last Name:</label>
  			           <input type="text" class="form-control" id="lname-{{$user->id}}">
  		        	</div>
          		</div>
          	</div>
            
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="contact" class="col-form-label">Contact Number:</label>
                  <input class="form-control" id="contact-{{$user->id}}">
                </div>
              </div>
              <div class="col gender" style="padding-top: 20px">
                <select class="custom-select custom-select-sm" id="gender-{{$user->id}}" name="gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div> 

  		      <div class="form-group">
              <label for="recipient-name" class="col-form-label">Address:</label>
              <input type="text" class="form-control" id="address-{{$user->id}}">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Birthday:</label>
              <input type="text" class="form-control" id="date-{{$user->id}}">
            </div>
        </div>
        <div class="modal-footer">
        	<input type="hidden" id="ui-id-{{$user->id}}" value="{{$user->id}}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="updatePI-{{$user->id}}" value="{{$user->id}}" class="btn btn-primary updatePeer">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>