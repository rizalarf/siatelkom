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
    <li class="active">Pendaftaran Sidang</li>
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
          <h3 class="box-title">Pendaftaran Sidang Tugas Akhir - Input</h3>
        </div>
        <div class="box-body">
          <form id="formcreateDaftar" class="form-horizontal" role="form" method="POST" action="{{ url('/daftar-sidang/store') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="col-md-4 control-label">Judul</label>
            <div class="col-md-6 @if ($errors->has('idJudul')) has-error @endif">
              <select class="form-control input-sm" name="idJudul">
                <option value="">-- Pilih Judul --</option>
                @foreach ($judul as $item)
                <option value="{{ $item->id }}">{{ $item->jdJudul }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal </label>
            <div class="col-md-6">
                <div class="input-group date" data-provide='datepicker'>
                  <input type="text" class="form-control datepicker" name="stPengajuan" value="{{ Request::old('stPengajuan') }}">
                  <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </div>
                </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">No. Surat Tugas</label>
            <div class="col-md-6 @if ($errors->has('stNoSurat')) has-error @endif">
              <input type="text" class="form-control" name="stNoSurat" value="{{Request::old('stNoSurat')}}" placeholder="Enter No. Surat Tugas">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Sidang</label>
            <div class="col-md-6">
                <div class="input-group date" data-provide='datepicker'>
                  <input type="text" class="form-control datepicker" name="stTglSid" value="{{ Request::old('stTglSid') }}">
                  <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </div>
                </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Waktu</label>
            <div class="col-md-6 @if ($errors->has('stWktSid')) has-error @endif">
              <input type="text" class="form-control" name="stWktSid" value="{{Request::old('stWktSid')}}" placeholder="Enter Waktu">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tempat</label>
            <div class="col-md-6 @if ($errors->has('idRuang')) has-error @endif">
              <select class="form-control input-sm" name="idRuang">
                <option value="">-- Pilih Ruang --</option>
                @foreach ($ruang as $item)
                <option value="{{ $item->id }}">{{ $item->ruangNama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- <div class="form-group">
            <label class="col-md-4 control-label">Ketua Penguji</label>
            <div class="col-md-6 @if ($errors->has('idDosen')) has-error @endif">
              <select class="form-control input-sm" name="idDosen">
                <option value="">-- Pilih Ketua Penguji --</option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                @endforeach
              </select>
            </div>
          </div> -->

          <div class="form-group">
            <label class="col-md-4 control-label">Penguji 1</label>
            <div class="col-md-6 @if ($errors->has('stP1')) has-error @endif">
              <select class="form-control input-sm" name="stP1">
                <option value="">-- Pilih Penguji 1 --</option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Penguji 2</label>
            <div class="col-md-6 @if ($errors->has('stP2')) has-error @endif">
              <select class="form-control input-sm" name="stP2">
                <option value="">-- Pilih Penguji 2 --</option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Penguji 3</label>
            <div class="col-md-6 @if ($errors->has('stP3')) has-error @endif">
              <select class="form-control input-sm" name="stP3">
                <option value="">-- Pilih Penguji 3 --</option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Sekretaris Penguji</label>
            <div class="col-md-6 @if ($errors->has('stPS')) has-error @endif">
              <select class="form-control input-sm" name="stPS">
                <option value="">-- Pilih Sekretaris Penguji --</option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- <div class="form-group">
            <label class="col-md-4 control-label">Tandai jika telah melengkapi</label>
            <div class="col-md-6">
              <input type="checkbox" class="form-control flat-red"> Syarat 1
              <input type="checkbox" class="form-control flat-red"> Syarat 2
              <input type="checkbox" class="form-control flat-red"> Syarat 3
              <input type="checkbox" class="form-control flat-red"> Syarat 4
              <input type="checkbox" class="form-control flat-red"> Syarat 5
              <input type="checkbox" class="form-control flat-red"> Syarat 6
              <input type="checkbox" class="form-control flat-red"> Syarat 7
              <input type="checkbox" class="form-control flat-red"> Syarat 8
            </div>
          </div> -->

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary" id="button-reg">
                Save
              </button>
              <a href="{{{ action('TA\TugasAkhirController@indexDaftar') }}}" title="Cancel">
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
