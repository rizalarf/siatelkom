@extends('admin.layouts.master')
@section('content')
<!-- header -->
<div class="content-header">
  <h1>Beranda</h1>
  <ol class="breadcrumb">
    <li><a href="main"><i class="fa fa-home"></i> Beranda</a></li>
  </ol>
</div>
<section class="content">
  <div class="callout callout-info">
    <span><img class="img-lg padding"src="{{URL::asset('admin/dist/img/polines2.png')}}" alt="" /></span>
    <h4>Selamat Datang {{ Auth::user()->name  }}</h4>
    <h3>SISTEM INFORMASI AKADEMIK TEKNIK TELEKOMUNIKASI</h3>
    <h5>POLITEKNIK NEGERI SEMARANG</h5>
  </div>
  <!-- Main content -->
  <div class="row">
    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Program Studi Teknik Telekomunikasi Polines</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
              <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                <img src="{{ URL::asset('admin/dist/img/wallpaper10.jpg') }}" alt="First slide">
              </div>
              <div class="item">
                <img src="{{ URL::asset('admin/dist/img/wallpaper11.jpg') }}" alt="Second slide">
              </div>
              <div class="item">
                <img src="{{ URL::asset('admin/dist/img/wallpaper9.jpg') }}" alt="Third slide">
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data</span>
          <span class="info-box-number">Mahasiswa</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-purple"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data</span>
          <span class="info-box-number">Dosen</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data</span>
          <span class="info-box-number">Jadwal Kuliah</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-industry"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data</span>
          <span class="info-box-number">Magang</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Data</span>
          <span class="info-box-number">Tugas Akhir</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->

  </div><!-- /.row -->
</section>

@endsection
