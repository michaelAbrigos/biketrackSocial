@extends('Layouts.master')
@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
<div class="main-container">

        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-md-9 mb-1 order-md-2">
                    <div class="card card-sm">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Real Time Location</h6>
                            </div>
                        </div>
                        @can('Search History')
                        <div class="list-group list-group-flush" style="height: 420px;">
                            <div id="map"></div>
                        </div>
                        @else
                            <section class="height-70">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6 col-lg-5">
                                            <div class="card card-lg text-center">
                                                <div class="card-body">
                                                    <i class="material-icons opacity-20 display-4">map</i>
                                                    <h1 class="h5">Looks like you dont have a device for us to save your location</h1>
                                                    <p>
                                                        Please add a device in order for us to save your location and show your bike loaction history
                                                    </p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of col-->
                                    </div>
                                    <!--end of row-->
                                </div>
                                <!--end of container-->
                            </section>
                        @endcan
                    </div>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-3 mb-1 order-md-1">
                    <div class="card">
                        <form>
                            <div class="card-header nav-color"><h6 class="text-white">Enter Date and Time</h6></div>
                            <div class="form-group list-group list-group-flush">
                                <input type="text" placeholder="Start date" class="form-control list-group-item date" id="start">
                            </div>
                            <div class="form-group list-group list-group-flush">
                                    <input type="text" placeholder="End date" class="form-control list-group-item date" id="end">
                            </div>
                            <div class="card-footer text-right">
                                <input type="hidden" name="device_id" id="device_id" value="{{$device->id}}">
                                <a class="btn btn-warning" id="submit">Search</a>
                            </div>
                        </form>
                    </div>
                    @include('Layouts.newSidebar')
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
       
</div>

<script src="{{asset('/js/history.js')}}" type="text/javascript"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&callback=initMap">
</script> 
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.date').bootstrapMaterialDatePicker({maxDate : new Date(), format: 'YYYY-MM-DD HH:mm' });
    });
    </script>
    
@endsection