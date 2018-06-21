<div class="modal fade" id="peerAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Peer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('device.store')}}">
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fname" class="col-form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" required name="fname">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lname" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" required name="lname">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="username" required name="username">
                    </div>
                </div>
                <div class="col" style="padding-top: 20px">
                    <select class="custom-select custom-select-sm" name="gender">
                      <option value="Male" disabled selected>Gender</option>
                      <option id="gender1" value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" required name="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="pass" required name="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><img src="{{asset('icons/eye.svg')}} " style="height: 15px;" onclick="showPass()" id="eye"  data-toggle="tooltip" data-placement="right" title="Show/Hide Password"></span>
                        </div>
                    </div>
                    </div> 
                </div>
            </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" id="addPeer" class="btn btn-raised btn-success">Add Device</button>
        </div>
      </form>
    </div>
  </div>
</div>