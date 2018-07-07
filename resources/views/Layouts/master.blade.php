<div class="bg">
@include('Layouts.header')
@include('Layouts.nav')

@yield('content')

@include('Layouts.footer')  
</div>
@include('Scripts.addFriendAjax')