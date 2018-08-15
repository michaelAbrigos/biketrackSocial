<div class="modal fade" id="confirmDeleteModal-{{$user->id}}" >
  <div class="modal-dialog modal-confirm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title">Edit Permission</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" style="padding-top: none;">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"  data-dismiss="modal">Cancel</button>
        <button type="submit" id="{{$user->id}}" class="btn btn-danger unfriendConfirm">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>