<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/contents/polines2.png') }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SIA | Login</title>
  <!--browser to be responsive to screen width-->

  <!--bootstrap-->
  <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css">
  <!--font awesome-->
  <link rel="stylesheet" href="{{asset('admin/bootstrap/css/font-awesome.min.css')}}" type="text/css">
  <!--ionicons-->
  <link rel="stylesheet" href="{{asset('admin/bootstrap/css/ionicons.min.css')}}" type="text/css">
  <!--theme style-->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.css')}}" type="text/css">
  <link href=" {{asset('admin/dist/css/app.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('admin/dist/css/style.css')}}" type="text/css">

  <!-- Scripts -->
  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('admin.login.navbar')
    <section class="content">
      @yield('content')
    </section>

    <script src="{{ url('admin') }}/js/jquery-2.1.1.min.js"></script>
    <!--bootstrapjs-->
    <script src="{{ url('admin') }}/bootstrap/js/bootstrap.min.js"></script>
    <!--fast click-->
    <script src="{{ url('admin') }}/plugins/fastclick/fastclick.min.js"></script>
    <!--slimscroll-->
    <script src="{{ url('admin') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="{{ url('admin') }}/js/nifty.min.js"></script>
  </body>
  </html>
