<div class="modal fade" id="deviceAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('device.store')}}">
        <div class="modal-body">
            <div class="form-group">
                <label for="username" class="col-form-label">Device Code:</label>
                <input type="text" class="form-control" required id="code">
            </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" id="submitDevice" class="btn btn-primary">Add Device</button>
        </div>
      </form>
    </div>
  </div>
</div>