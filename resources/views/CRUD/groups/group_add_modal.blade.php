<div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
	      <div class="modal-body">
	      
			<div class="form-group">
	            <label for="gname" class="bmd-label-floating">Group Name</label>
	            <input type="text" class="form-control" required id="gname">
          	</div>

          	<div class="form-group">
	            <label for="desc" class="bmd-label-floating">Description</label>
	            <input type="text" class="form-control" required id="desc">
          	</div>
		
		 	<div class="form-group">
	            <label for="email" class="bmd-label-floating">Add Members</label>
	            <input type="email" class="form-control" required id="members">
        	</div>
	        		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Create</button>
	      </div>
      </form>
    </div>
  </div>
</div>