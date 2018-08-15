@extends('Layouts.master')

@section('content')

<div class="main-container">

    @can('View Map')

        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-md-9 mb-1 order-md-2">
                    <div class="card card-sm">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Real Time Location</h6>
                            </div>
                        </div>
                        <div class="list-group list-group-flush" style="height: 420px;">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-3 mb-1 order-md-1">
                    @include('Layouts.newSidebar')
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
       @else
            <section class="height-70">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="card card-lg text-center">
                                <div class="card-body">
                                    <i class="material-icons opacity-20 display-4">map</i>
                                    <h1 class="h5">Looks like you dont have access for tracking your Bike User</h1>
                                    <p>
                                        Contact your peer for permission.
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

@include('Scripts.locationUpdate')
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&callback=initMap">
</script> 
@endsection
