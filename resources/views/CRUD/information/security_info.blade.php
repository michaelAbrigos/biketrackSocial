<div class="tab-pane fade" id="device" role="tabpanel" arialabelledby="billing-tab">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h5>Device Information</h5>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <div class="row">
            <div class="col-12 col-md-4 order-md-2">
                <div class="alert alert-info text-small" role="alert">
                    <i class="icon-user"></i>
                    <span>
                        Add a device in order for you to get more functionalities.
                    </span>
                    <a href="#">View your public profile</a>
                </div>
            </div>
            <!--end of col-->
            <div class="col-12 col-md-8 order-md-1">
                <form class="row" method="PUT">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="username">Device Code:
                                    <span class="text-red">*</span>
                                </label>
                                @if(count($devices)==1)
                                    <input class="form-control form-control-lg" type="text" name="deviceCode" required id="code" readonly />
                                    <small>Enter a code to add a device</small>
                                            
                                @else
                                    <input class="form-control form-control-lg" type="text" name="deviceCode" required id="code" />
                                    <small>Enter a code to add a device</small>
                                        
                                @endif
                            
                        </div>
                    </div>
                    

                    <div class="col-12">
                    <div class="form-group">
                            <button class="btn btn-secondary" name="saveInfo" id="deviceCode" >Add Device</button>
                        </div>
                    </div>
                    

                    {{-- <div class="col-12">
                        <h5>List Devices</h5>
                        @foreach($devices as $dev)
                            @foreach($dev as $key => $d)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p style="display: inline-block;">{{ $d->device_name[$key]}} </p>
                                            </div>
                                            <div class="col-md-6 text-right small-center">
                                                <button type="button" class="btn btn-raised btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>	
                                </div>
                            @endforeach
                        @endforeach
                    </div> --}}
                </form>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
        <!--end of row-->
    </div>
    <!--end of container-->
</div>