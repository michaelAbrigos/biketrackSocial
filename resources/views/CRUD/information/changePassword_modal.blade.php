<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
	      <div class="modal-body">
			<div class="form-group">
	            <label for="username" class="col-form-label">Old Password:</label>
	            <input type="password" class="form-control" required id="oldPassword">
          	</div>
          
      		 	<div class="form-group">
              <label for="password" class="col-form-label">New Password:</label>
              <div class="input-group">
                <input type="password" class="form-control" required id="pass">
                <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><img src="{{asset('icons/eye.svg')}} " style="height: 15px;" onclick="showPass()" id="eye"  data-toggle="tooltip" data-placement="right" title="Show/Hide Password"></span>
            </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Confirm New Password:</label>
            <input type="password" class="form-control" required id="Confirm pass">
          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Update</button>
	      </div>
      </form>
    </div>
  </div>
</div>

