<div class="modal fade" id="confirmDeleteModal-{{$user->id}}" >
  <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title">Are you sure?</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" style="padding-top: none;">
        <p>Do you really want to remove {{$user->username}} from your peer list? This can't be undone!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"  data-dismiss="modal">Cancel</button>
        <button type="submit" id="{{$user->id}}" class="btn btn-danger deletePeerConfirm">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>