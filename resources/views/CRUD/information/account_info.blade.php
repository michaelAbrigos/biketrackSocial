<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="general-tab">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="media flex-wrap mb-0 align-items-center">
                    @if($users->avatar_url)
                        <img alt="Image" src="{{asset($users->avatar_url)}}" class="avatar avatar-lg mb-3 mb-md-0" />
                    @else
                        @if($users->gender == "Male")
                            <img alt="Image" src="{{asset('/avatars/male1.svg')}}" class="avatar avatar-lg mb-3 mb-md-0" />
                        @else
                            <img alt="Image" src="{{asset('/avatars/female.svg')}}" class="avatar avatar-lg mb-3 mb-md-0" />
                        @endif
                    
                    @endif
                    
                    <div class="media-body">
                        <form>
                            <label class="custom-file mb-2" for="file2">
                                <input type="file" id="file2" class="custom-file-input height-0">
                                <span class="btn btn-warning"><i class="material-icons" style="font-size: 16px; top: 2px; position: relative;">cloud_upload</i> Upload</span>
                            </label>
                            <div>
                                <small>For best results, use an image at least 256px by 256px in either .jpg or .png format</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <hr>
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first-name">First Name:
                                <span class="text-red">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" name="fname" required  value="{{ $users->first_name}}" id="first-name" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last-name">Last Name:
                            	<span class="text-red">*</span>
                        	</label>
                            <input class="form-control form-control-lg" type="text" name="lname" required value="{{ $users->last_name}}" id="last-name" />
                        </div>
                    </div>
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
                            <input class="form-control form-control-lg" type="email" value="{{ $users->user->email}}" name="email" required id="emailaddress" />
                            <small>Used to log in to your account</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit" name="submit" disabled>Save changes</button>
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