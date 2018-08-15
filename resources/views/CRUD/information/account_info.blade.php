<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="general-tab">
    <div class="container">
        <!--end of row-->
        <div class="row mb-4">
            <div class="col">
                <h5>Account Details</h5>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <div class="row">
            <div class="col-12 col-md-4 order-md-2">
                <div class="alert alert-info text-small" role="alert">
                    <i class="icon-shield"></i>
                    <span>
                        Your information is always kept encrypted and can never be accessed by third parties.
                    </span>
                    <a href="#">See our privacy policy</a>
                </div>
            </div>
            <!--end of col-->
            <div class="col-12 col-md-8 order-md-1">
                <form class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="username">Username:
                                <span class="text-red">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->user->username}}" name="username" required id="username" />
                            <small>This will be displayed on your public profile</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="emailaddress">Email Address:
                                <span class="text-red">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="email" readonly value="{{ $users->user->email}}" name="email" required id="emailaddress" />
                            <small>Used to log in to your account</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <input type="hidden" id="ui-id1" value="{{Auth::id()}}">
                            <button class="btn btn-secondary" id="submitAccount" name="submit" disabled>Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <hr>
        
    </div>
    <!--end of container-->
</div>