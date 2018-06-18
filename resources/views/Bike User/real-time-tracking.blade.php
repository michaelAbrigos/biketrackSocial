@extends('Layouts.master')

@section('content')

<body>
  <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
  @include('Layouts.sidebar')
  
  <main class="bmd-layout-content">
    
    <div class="container">
      <br>
      <h1 class="navbar-brand">Real time location</h1>
    </div>
      
    <div class="container" style="border: 1px solid gray;height: 400px;margin-top: 20px;">
      
      <div id="map"></div>
    </div>
    
  </main>

</div>
</body>  

@include('Scripts.locationUpdate')   
</html>

@endsection
