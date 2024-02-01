<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('layouts.head')
</head>
<body>
<div class="container">
   <header class="row">
       @include('layouts.header')
   </header>
   <div class="container" style="margin-top:50px">
        @include('layouts.messages')
        @yield('content')
        <footer class="row">
            @include('layouts.footer')
        </footer>
   </div>
</div>
</body>
</html>
