@extends('admin.layouts.master')
@section('breadcrump')
<h1>
  Dashboard
  <small>Halaman Utama</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
  <li class="active">Here</li>
</ol>
@stop

@section('content')
<!-- Main content -->
<section class="content">
  <div class="callout callout-info">
    <h4>Selamat Datang {{Auth::user()->name}}</h4>
    <p>Halaman ini berisi informasi tentang Prodi Teknik Telekomunikasi Politeknik Negeri Semarang</p>
  </div>
</section>
<!-- /.content -->
@endsection
@section('script')
@endsection
