@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Jadwal Kuliah</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data Jadwal Kuliah</li>
    <li><a href="{{{ action('Jadwal\JadwalKuliahController@index') }}}">Data Jadwal Kuliah</a></li>
    <li class="active">Tambah Jadwal Kuliah</li>
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
          <h3 class="box-title">Tambah Jadwal Kuliah</h3>
        </div>
        <div class="box-body">
            <form id="formJadwalKuliahTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/jadwalkuliah/tambahjadwal') }}"><!--Tampilan form pengisian-->
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
              <label class="col-md-4 control-label">Kelas </label>
              <div class="col-md-6  @if ($errors->has('idKelas')) has-error @endif">
                <select class="form-control" name="idKelas">
                  <option value="">-- Pilih Kelas--</option>
                  @foreach ($kelas as $item)
                  <option value="{{$item->id}}">{{$item->klsNama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Hari </label>
                <div class="col-md-6  @if ($errors->has('idHari')) has-error @endif">
                  <select class="form-control" name="idHari">
                    <option value="">-- Pilih Hari --</option>
                      @foreach ($hari as $item)
                        <option value="{{$item->id}}">{{$item->hrNama}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Jam Ke</label>
                <div class="col-md-6  @if ($errors->has('idJam')) has-error @endif">
                  <select class="form-control" name="idJam">
                    <option value="">-- Pilih Jam Ke --</option>
                      @foreach ($jam as $item)
                        <option value="{{$item->id}}">{{$item->jmKode}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
          <!--  <div class="form-group">
                <label class="col-md-4 control-label">Jam Mulai </label>
                <div class="col-md-6  @if ($errors->has('idJam')) has-error @endif">
                  <select class="form-control" name="idJam">
                    <option value="">-- Pilih Jam Mulai--</option>
                      @foreach ($jam as $item)
                        <option value="{{$item->id}}">{{$item->jmMulai}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Jam Selesai </label>
                <div class="col-md-6  @if ($errors->has('idJam')) has-error @endif">
                  <select class="form-control" name="idJam">
                    <option value="">-- Pilih Jam Selesai--</option>
                      @foreach ($jam as $item)
                        <option value="{{$item->id}}">{{$item->jmSelesai}}</option>
                      @endforeach
                    </select>
                </div>
            </div>-->
            <div class="form-group">
                <label class="col-md-4 control-label">Mata Kuliah </label>
                <div class="col-md-6  @if ($errors->has('idMakul')) has-error @endif">
                  <select class="form-control" name="idMakul">
                    <option value="">-- Pilih Mata Kuliah--</option>
                      @foreach ($makul as $item)
                        <option value="{{$item->id}}">{{$item->makulNama}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Pengampu </label>
                <div class="col-md-6  @if ($errors->has('idPengampu')) has-error @endif">
                  <select class="form-control" name="idPengampu">
                    <option value="">-- Pilih Pengampu--</option>
                      @foreach ($pengampu as $item)
                        <option value="{{$item->id}}">{{$item->dosNama}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Ruang </label>
                <div class="col-md-6  @if ($errors->has('idRuang')) has-error @endif">
                  <select class="form-control" name="idRuang">
                    <option value="">-- Pilih Ruang--</option>
                      @foreach ($ruang as $item)
                        <option value="{{$item->id}}">{{$item->ruangNama}}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('Jadwal\JadwalKuliahController@index') }}}" title="Cancel">
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
