<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIA | Prodi Teknik Telekomunikasi Polines</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/contents/polines2.png') }}">
    @include('admin.include.style')
    @include('admin.include.script')
  </head>

  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

      @include('admin.include.header')

      @include('admin.include.sidebar')

      <div class="content-wrapper">

        <section class="content">
          @yield('content')
        </section>
      </div>

      <!--scroll top button-->
      <!--============================================-->
      <!--<div class="pull-right pad">
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
      </div>-->
      <!--============================================-->



@stack('javascript')
</body>
</html>
