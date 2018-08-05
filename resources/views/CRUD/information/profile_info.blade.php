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
                            <label for="city">Gender:</label>
                            <select class="custom-select mb-2 form-control-lg">
                                <option selected>Open this select menu</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="country">Birthday:</label>
                            <input class="form-control form-control-lg" type="text" name="bday" value="{{ $bday }}" id="date" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Home Address:</label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->home_address }}" name="address" id="address" />
                            <small>This will not be displayed on your public profile</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input class="form-control form-control-lg" type="text" value="{{ $users->contact_number }}" name="contact" id="website" />
                            <small>This will not be displayed on your public profile</small>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="about-me">About me:</label>
                            <textarea class="form-control form-control-lg" name="profileBio" rows="4" id="about-me"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox custom-checkbox-switch">
                                <input type="checkbox" class="custom-control-input" name="profilePublic" id="public" />
                                <label class="custom-control-label" for="public">Make my profile public</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit" disabled>Save changes</button>
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