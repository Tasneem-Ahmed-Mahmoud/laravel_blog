<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
 
  <title>AdminLTE 3 | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
</head>
<body  class="hold-transition login-page">
    <div id="app">
      
        <main class="py-4">
            @yield('content')
        </main>
    </div>


<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
  
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
