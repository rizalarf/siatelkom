@extends('admin.layouts.master')
@section('breadcrump')
<h1>
  Manajemen User
  <!-- <small>Menu</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
  <li class="active">Manajemen User</li>
</ol>
@stop

<!-- Main content -->
@section('content')
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>10</h3>
          <p>Dosen</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3>15<sup style="font-size: 20px"></sup></h3>
          <p>Mahasiswa</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="mahasiswa" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
@endsection
@section('script')
@endsection
