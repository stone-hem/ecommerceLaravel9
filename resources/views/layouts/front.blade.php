<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield("title")
    </title>

    <!-- Scripts -->

    <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ asset('front/main.css') }}" rel="stylesheet">

    <style>
        a{
            text-decoration: none;
        }
    </style>
   
</head>
<body>
    @include("layouts.inc.frontnavbar")
    <main>
    @yield('main-content position-relative max-height-vh-100 h-100 border-radius-lg')
    </main>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   @if(session('status'))
   <script>
    swal("{{session('status')}}");//to show status message but not working at the moment
   </script>
   @endif
   @yield('scripts')
</body>
</html>
