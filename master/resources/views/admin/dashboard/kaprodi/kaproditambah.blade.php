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
  <h1>Kaprodi</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data User</li>
    <li><a href="{{{ action('Kaprodi\KaprodiController@index') }}}">Data Kaprodi</a></li>
    <li class="active">Tambah Kaprodi</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="uk-alert uk-alert-success" data-uk-alert>
          <a href="" class="uk-alert-close uk-close"></a>
          <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
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
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Kaprodi</h3>
        </div>
        <div class="box-body">
          <form id="formKaprodiTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/kaprodi/tambahkaprodi') }}"><!--Tampilan form pengisian-->
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
              <label class="col-md-4 control-label">Nama</label>
              <div class="col-md-6 @if ($errors->has('idDosen')) has-error @endif">
                  <input type="text" class="form-control" name="idDosen" value="{{Request::old('idDosen')}}" placeholder="Enter Nama">
                  <small class="help-block"></small>
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">Program Studi</label>
              <div class="col-md-6 @if ($errors->has('idProdi')) has-error @endif">
                  <input type="text" class="form-control" name="idProdi" value="{{Request::old('idProdi')}}" placeholder="Enter Program Studi">
                  <small class="help-block"></small>
              </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Minimal</label>
            <div class="col-md-6">
            <select class="form-control select2" name="idProdi" value="{{Request::old('idProdi')}}" placeholder="Enter Program Studi">
              <option selected="selected"></option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Mulai Menjabat</label>
            <div class="col-md-6 @if ($errors->has('kapMulai')) has-error @endif">
              <div class="input-group">
                <div class="input-group date" data-provide='datepicker' style="width: 218%;">
                  <input type="text" class="form-control datepicker-me" name="kapMulai" value="{{Request::old('kapMulai')}}" placeholder="Enter Tanggal">
                  <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary" id="button-reg">
                      Save
                  </button>
                  <a href="{{{ action('Kaprodi\KaprodiController@index') }}}" title="Cancel">
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
</section>
<!-- /.content -->
</div>
@endsection
