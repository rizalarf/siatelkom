@extends('admin.layouts.master')
@push('style')
<!--  -->
@endpush
@push('javascript')
<!--  -->
@endpush

<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Bimbingan</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Tugas Akhir</li>
    <li class="active">Bimbingan</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">{{$mahasiswa->mhsNama}} - Komentar</h3>
        </div>
        <div class="box-body">
        </div>
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/dosen-bimbingan/'.$data->id.'/update') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $data->id }}">

          <div class="form-group">
            <label class="col-md-4 control-label">Nama Mahasiswa </label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="idJudul" value="{{ $mahasiswa->mhsNama }}" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Judul Tugas Akhir </label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="jdJudul" value="{{ $judul->jdJudul }}" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal </label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="bbTanggal" value="{{ $data->bbTanggal }}" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Minggu </label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="bbMinggu" value="{{ $data->bbMinggu }}" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Uraian </label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="bbUraian" value="{{ $data->bbUraian }}" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Komentar </label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="bbKomen" value="{{ $data->bbKomen }}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary" id="button-reg">
                Save
              </button>
              <a href="{{{ action('RoleDsn\RoleDsnController@indexBimbingan') }}}" title="Cancel">
                <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
              </a>
            </div>
          </div>
        </form>

      </div>

    </div>

  </div>
</section>
<!-- /.content -->
</div>
@endsection
