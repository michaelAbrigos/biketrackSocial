@extends('Layouts.master')

@section('content')

<body>
  <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
  @include('Layouts.sidebar')
  
  <main class="bmd-layout-content">
      
    <div class="" style="border-radius:5px;box-shadow: 0 10px 10px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1); height: 540px; margin: 20px;">
      
      <div id="map"></div>
    </div>
    
  </main>

</div>
</body>  

@include('Scripts.locationUpdate')   
</html>

@endsection
