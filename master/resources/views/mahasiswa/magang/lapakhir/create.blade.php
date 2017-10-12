@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<link  href="{{ url('admin') }}/bower_components/select2/dist/css/select2.min.css"rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('admin') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('admin') }}/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
$(document).ready(function () {
  $.fn.datepicker.defaults.format = 'yyyy-mm-dd';
  $('.datepicker-me').datepicker({
    //format: 'yyyy-mm-dd',
  });
});
</script>
@endpush
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Laporan Akhir</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Magang</li>
      <li><a href="{{{ action('RoleMhs\RoleMhsController@laporanakhir') }}}">Laporan Akhir</a></li>
      <li class="active">Tambah Laporan Akhir</li>
    </ol>
</div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
             <strong>Maaf!</strong> Terjadi kesalahan input data.<br><br>
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
           </div>
        @endif
        @if(session()->has('successMessage'))
          <div class="alert alert-success">
            {{ session()->get('successMessage')}}
          </div>
        @endif
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Laporan Akhir</h3>
          </div>
          <div class="box-body">
            <form id="formLapakhirTambah" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/lapakhirmhs/tambahlapakhir') }}"><!--Tampilan form pengisian-->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<div class="form-group">
                  <label class="col-md-4 control-label">ID</label>
                    <div class="col-md-6 @if ($errors->has('id')) has-error @endif">
                      <input type="text" class="form-control" name="id" value="{{Request::old('id')}}">
                      <small class="help-block"></small>
                    </div>
                </div>
                -->
                <!--Untuk menambahkan kolom ID jika ingin ditampilkan (tapi tidak perlu) -->
                <div class="form-group">
                  <label class="col-md-4 control-label">Mahasiswa</label>
                    <div class="col-md-6 @if ($errors->has('idPas')) has-error @endif">
                      <select class="form-control" name="idPas">
                        <option value="">-- Pilih Nama Mahasiswa --</option>
                          @foreach ($mahasiswa as $item)
                            <option value="{{$item->id}}">{{$item->mhsNama}}</option>
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Tanggal</label>
                    <div class="col-md-6 @if ($errors->has('lapakTanggal')) has-error @endif">
                      <div class="input-group">
                        <div class="input-group date" data-provide='datepicker' style="width: 218%;">
                          <input type="text" class="form-control datepicker-me" name="lapakTanggal" value="{{Request::old('lapakTanggal')}}" placeholder="Enter Tanggal">
                            <div class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                        <small class="help-block"></small>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Isi Kegiatan</label>
                    <div class="col-md-6 @if ($errors->has('lapakIsi')) has-error @endif">
                      <input accept=".doc, .docx,.pdf, .jpeg, .jpg" type="file" style="width:100%" class="form-control" name="lapakIsi"  value="{{Request::old('lapakIsi')}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('RoleMhs\RoleMhsController@laporanakhir') }}}" title="Cancel">
                      <button type="button" class="btn btn-default" id="button-reg">
                          Cancel
                      </button>
                    </a>
                  </div>
                </div>
            </form>
          </div><!--"box-body"-->
        </div><!--"box box-primary"-->
      </div><!--"col-xs-12"-->
    </div><!--"row"-->
  </section><!-- /.content -->
</div>
@endsection
