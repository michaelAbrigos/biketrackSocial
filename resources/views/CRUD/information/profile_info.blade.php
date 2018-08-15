<div class="tab-pane fade" id="profile" role="tabpanel" arialabelledby="billing-tab">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h5>Profile Information</h5>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <div class="row">
            <div class="col-12 col-md-4 order-md-2">
                <div class="alert alert-info text-small" role="alert">
                    <i class="icon-user"></i>
                    <span>
                        This information will appear on your public profile. A detailed public profile helps users with similar professional interests and location to connect with you.
                    </span>
                    <a href="#">View your public profile</a>
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="city">Gender:</label>
                            <select class="custom-select mb-2 form-control-lg">
            
                                <option id="gender1" value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="country">Birthday:</label>
                            <input class="form-control form-control-lg" type="text" name="bday" value="{{ $users->birthday }}" id="date" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->address }}" name="address" id="address" />
                            <small>This will not be displayed on your public profile</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">City:</label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->city }}" name="address" id="city" />
                            <small>This will not be displayed on your public profile</small>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Zip Code:</label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->zip_code }}" name="address" id="zipcode" />
                            <small>This will not be displayed on your public profile</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->contact_number }}" name="contact" id="contact" />
                            <small>This will not be displayed on your public profile</small>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="about-me">About me:</label>
                            <textarea class="form-control form-control-lg" name="profileBio" rows="4" id="about-me">{{ $users->about_me }}</textarea>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <div class="form-group">
                        <input type="hidden" id="ui-id" value="{{Auth::id()}}">
                            <button class="btn btn-secondary" id="submitProfile" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <!--end of row-->
    </div>
    <!--end of container-->
</div>