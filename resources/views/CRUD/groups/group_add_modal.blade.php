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
	            <input type="text" class="form-control" required id="name">
          	</div>

          	<div class="form-group">
	            <label for="desc" class="bmd-label-floating">Description</label>
	            <input type="text" class="form-control" required id="description">
          	</div>

          	<div class="form-group">
          		<label for="desc" class="bmd-label-floating">Members</label>
				<div class="input-group">
				<select class="custom-select" id="memberSelect">
					<option>
						Choose a friend...
					</option>
				</select>
					<div class="input-group-prepend">
	          			<i class="material-icons" id="add"  data-toggle="tooltip" data-placement="right" title="Add members" style="cursor: pointer;">add</i>
	          		</div>
				</div>
          		<div style="padding-top: 5px;" id="addedMember"><small>Added: </small></div>
          	</div>
	        		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" id="closeModal">Close</button>
	        <button type="submit" class="btn btn-primary" id="createGroup">Create</button>
	      </div>
      </form>
    </div>
  </div>
</div>