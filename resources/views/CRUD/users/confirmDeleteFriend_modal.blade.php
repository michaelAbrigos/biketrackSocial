<div class="modal fade" id="confirmDeleteModal-{{$friend->id}}" >
  <div class="modal-dialog modal-confirm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title">Remove Friend</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" style="padding-top: none;">
        <p>Do you really want to remove {{$friend->information->first_name}} {{$friend->information->last_name}} from your friends list?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"  data-dismiss="modal">Cancel</button>
        <button type="submit" id="{{$friend->id}}" class="btn btn-danger unfriendConfirm">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>