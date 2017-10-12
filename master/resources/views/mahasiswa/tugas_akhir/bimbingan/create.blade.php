@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<!--DataTables Sample [ SAMPLE ]-->
<script src="{{ url('admin') }}/js/demo/tables-datatables.js"></script>
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

@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Kontrol Bimbingan</li>
  </ol>
</div>
<!--main content-->
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
          <h3 class="box-title">Tambah Bimbingan</h3>
        </div>
        <div class="box-body">
            <form id="createBimingan" class="form-horizontal" role="form" method="POST" action="{{ url('/kontrol-bimbingan/store') }}"><!--Tampilan form pengisian-->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label class="col-md-4 control-label">Nama </label>
              <div class="col-md-6  @if ($errors->has('idDosen')) has-error @endif">
                <select class="form-control input-sm" name="idDosen">
                  <option value="">-- Pilih Dosen --</option>
                  @foreach ($dosbing as $item)
                  <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Tanggal </label>
              <div class="col-md-6">
                  <div class="input-group date" data-provide='datepicker'>
                    <input type="text" class="form-control datepicker" name="bbTanggal" value="{{ Request::old('bbMinggu') }}">
                    <div class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </div>
                  </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Minggu</label>
              <div class="col-md-6 @if ($errors->has('bbMinggu')) has-error @endif">
                <input type="text" class="form-control" name="bbMinggu" value="{{Request::old('bbMinggu')}}" placeholder="Minggu">
                <small class="help-block"></small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Uraian</label>
              <div class="col-md-6 @if ($errors->has('bbUraian')) has-error @endif">
                <textarea class="form-control" name="bbUraian" rows="10"></textarea>
              </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('RoleMhs\RoleMhsController@indexKontrolBimbingan') }}}" title="Cancel">
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
