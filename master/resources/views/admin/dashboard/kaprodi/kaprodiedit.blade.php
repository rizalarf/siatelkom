@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('admin') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
    <li class="active">Edit</li>
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
          <h3 class="box-title">{{$idDosen}} - Edit</h3>
        </div>
        <div class="box-body">
          <form id="formKaprodiEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/kaprodi/'.$id.'/simpanedit') }}"><!--Tampilan form pengisian-->
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{$id}}" >

          <!--<div class="form-group">
              <label class="col-md-4 control-label">ID</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="id" value="{{$id}}" disabled="true">
                  <small class="help-block"></small>
              </div>
          </div>-->
          <div class="form-group">
              <label class="col-md-4 control-label">Nama </label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="idDosen" value="{{$idDosen}}">
                  <small class="help-block"></small>
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">Program Studi </label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="idProdi" value="{{$idProdi}}">
                  <small class="help-block"></small>
              </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Mulai Menjabat </label>
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group date" data-provide='datepicker'>
                  <input type="text" class="form-control datepicker-me" name="kapMulai" value="{{$kapMulai}}">
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
                  <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
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
