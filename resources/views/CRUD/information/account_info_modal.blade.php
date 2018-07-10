<div class="modal fade" id="accountinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			<div class="form-group">
	            <label for="username" class="col-form-label">Username:</label>
	            <input type="text" class="form-control" required id="username">
          	</div>
		 	<div class="form-group">
	            <label for="email" class="col-form-label">Email:</label>
	            <input type="email" class="form-control" required id="email">
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