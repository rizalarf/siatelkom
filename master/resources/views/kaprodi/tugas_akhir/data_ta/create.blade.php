@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/plugins/iCheck/all.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/iCheck/icheck.min.js"></script>
<script src="{{ url('admin') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('admin') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
});
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
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Tugas Akhir</li>
    <li class="active">Sidang Proposal</li>
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
          <h3 class="box-title">Sidang Proposal - {{ $nmMahasiswa }}</h3>
        </div>
        <div class="box-body">
          <form id="formeditJudul" class="form-horizontal" role="form" method="POST" action="{{ url('/daftar-tugas-akhir/'.$judul->id.'/update') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $judul->id }}">

            <div class="form-group">
              <label class="col-md-4 control-label">NIM </label>
              <div class="col-md-6">
                <select class="form-control" name="idMahasiswa" disabled="">
                  <option value="">-- Pilih NIM --</option>
                    @foreach ($mahasiswa as $item)
                      @if ($item->id == $judul->idMahasiswa)
                        <option value="{{ $item->id }}" selected>{{ $item->mhsNim }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->mhsNim }}</option>
                      @endif
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Judul Tugas Akhir</label>
              <div class="col-md-6">
                <!-- <input type="text" class="form-control" name="jdJudul" value="{{Request::old('jdJudul')}}" placeholder="Enter Judul"> -->
                <textarea class="form-control" name="jdJudul" rows="4" disabled="">{{ $judul->jdJudul }}</textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Tahun </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="jdTahun" value="{{ $judul->jdTahun }}" disabled="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Pembimbing 1 </label>
              <div class="col-md-6">
                <select class="form-control" name="idDosbing1" disabled="">
                  <option value="">-- Pilih Dosen --</option>
                    @foreach ($dosen as $item)
                      @if ($item->id == $judul->idDosbing1)
                        <option value="{{ $item->id }}" selected>{{ $item->dosNama }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                      @endif
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Pembimbing 2 </label>
              <div class="col-md-6">
                <select class="form-control" name="idDosbing2" disabled="">
                  <option value="">-- Pilih Dosen --</option>
                    @foreach ($dosen as $item)
                      @if ($item->id == $judul->idDosbing2)
                        <option value="{{ $item->id }}" selected>{{ $item->dosNama }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                      @endif
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Tanggal Sidang </label>
              <div class="col-md-6">
                  <div class="input-group date" data-provide='datepicker'>
                    <input type="text" class="form-control datepicker" name="jdTanggal" value="{{ Request::old('jdTanggal') }}">
                    <div class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </div>
                  </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Waktu </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="jdWaktu" value="{{Request::old('jdWaktu')}}" placeholder="Waktu Sidang">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Tempat </label>
              <div class="col-md-6">
                <select class="form-control input-sm" name="idRuang">
                  <option value="">-- Pilih Ruang --</option>
                  @foreach ($ruang as $item)
                  <option value="{{ $item->id }}">{{ $item->ruangNama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Reviewer 1</label>
              <div class="col-md-6">
                <select class="form-control input-sm" name="idReviewer1">
                  <option value="">-- Pilih Reviewer 1 --</option>
                  @foreach ($dosen as $item)
                  <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Reviewer 2</label>
              <div class="col-md-6">
                <select class="form-control input-sm" name="idReviewer2">
                  <option value="">-- Pilih Reviewer 2 --</option>
                  @foreach ($dosen as $item)
                  <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Reviewer 3</label>
              <div class="col-md-6">
                <select class="form-control input-sm" name="idReviewer3">
                  <option value="">-- Pilih Reviewer 3 --</option>
                  @foreach ($dosen as $item)
                  <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" id="button-reg">
                  Daftar
                </button>
                <a href="{{{ action('RoleKaprodi\RoleKaprodiController@indexTA') }}}" title="Cancel">
                  <button type="button" class="btn btn-default" id="button-reg">
                    Batal
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
