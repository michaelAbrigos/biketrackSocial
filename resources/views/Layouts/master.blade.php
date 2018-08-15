@include('Layouts.header')
<meta name="_token" content="{!! csrf_token() !!}" />
@include('Layouts.nav1')

@yield('content')

@include('Layouts.footer')  

@guest
@else
<script src="{{asset('/js/autoSave.js')}}" type="text/javascript"></script>
@endguest
