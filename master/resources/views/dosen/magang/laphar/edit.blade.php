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
  <h1>Laporan Harian</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Magang</li>
      <li><a href="{{{ action('RoleDosen\RoleDosenController@laporanharian') }}}">Laporan Harian</a></li>
      <li class="active">Edit</li>
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
            <h3 class="box-title">Tanggal {{$data->lapTanggal}} - Edit</h3>
          </div>
          <div class="box-body">
            <form id="formLapharEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/laphardos/'.$data->id.'/simpanedit') }}"><!--Tampilan form pengisian-->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="{{$data->id}}" >

                <!--<div class="form-group">
                  <label class="col-md-4 control-label">ID</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="id" value="{{$data->id}}" disabled="true">
                      <small class="help-block"></small>
                    </div>
                </div>-->
                <!--Untuk menambahkan kolom ID jika ingin ditampilkan (tapi tidak perlu) -->
                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Mahasiswa</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="idPas" value="{{$data->idPas}}" disabled="true">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Tanggal</label>
                    <div class="col-md-6">
                      <div class="input-group">
                        <div class="input-group date" data-provide='datepicker' style="width: 218%;">
                          <input type="text" class="form-control datepicker-me" name="lapTanggal" value="{{$data->lapTanggal}}" disabled="true">
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
                    <div class="col-md-6">
                      <textarea class="form-control" name="lapIsi" disabled="true">{{$data->lapIsi}}</textarea>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Komentar</label>
                    <div class="col-md-6">
                      <textarea class="form-control" name="lapKomen">{{$data->lapKomen}}</textarea>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('RoleDosen\RoleDosenController@laporanharian') }}}" title="Cancel">
                      <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
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
