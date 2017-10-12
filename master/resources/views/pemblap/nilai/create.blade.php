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
@endpush
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Laporan Harian</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Magang</li>
    <li><a href="{{{ action('RolePembLap\RolePembLapController@nilaipemblap') }}}">Laporan Harian</a></li>
    <li class="active">Tambah Laporan Harian</li>
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
          <h3 class="box-title">Tambah Laporan Harian</h3>
        </div>
        <div class="box-body">
            <form id="formLapharTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/nilaipemblap/tambahnilai') }}"><!--Tampilan form pengisian-->
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
               <div class="col-md-4 @if ($errors->has('idPas')) has-error @endif">
                   <input type="text" class="form-control" name="idPas" value="{{Request::old('idPas')}}" placeholder="Enter Mahasiswa">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">Kemampuan beradaptasi dengan lingkungan</label>
               <div class="col-md-2 @if ($errors->has('kat1')) has-error @endif">
                   <input type="text" class="form-control" name="kat1" value="{{Request::old('kat1')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">a.	Kemampuan memahami instruksi</label>
               <div class="col-md-2 @if ($errors->has('kat2a')) has-error @endif">
                   <input type="text" class="form-control" name="kat2a" value="{{Request::old('kat2a')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">b.	Kualitas hasil pekerjaan</label>
               <div class="col-md-2 @if ($errors->has('kat2b')) has-error @endif">
                   <input type="text" class="form-control" name="kat2b" value="{{Request::old('kat2b')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">c.	Ketepatan waktu</label>
               <div class="col-md-2 @if ($errors->has('kat2c')) has-error @endif">
                   <input type="text" class="form-control" name="kat2c" value="{{Request::old('kat2c')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">d.	Kemampuan memecahkan masalah</label>
               <div class="col-md-2 @if ($errors->has('kat2d')) has-error @endif">
                   <input type="text" class="form-control" name="kat2d" value="{{Request::old('kat2d')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">Tanggung jawab terhadap tugas</label>
               <div class="col-md-2 @if ($errors->has('kat3')) has-error @endif">
                   <input type="text" class="form-control" name="kat3" value="{{Request::old('kat3')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">Inisiatif dan kreativitas</label>
               <div class="col-md-2 @if ($errors->has('kat4')) has-error @endif">
                   <input type="text" class="form-control" name="kat4" value="{{Request::old('kat4')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">a.	Bekerja dalam kelompok (kerjasama)</label>
               <div class="col-md-2 @if ($errors->has('kat5a')) has-error @endif">
                   <input type="text" class="form-control" name="kat5a" value="{{Request::old('kat5a')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">b.	Hubungan dengan atasan</label>
               <div class="col-md-2 @if ($errors->has('kat5b')) has-error @endif">
                   <input type="text" class="form-control" name="kat5b" value="{{Request::old('kat5b')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">c.	Hubungan dengan rekan sekerja</label>
               <div class="col-md-2 @if ($errors->has('kat5c')) has-error @endif">
                   <input type="text" class="form-control" name="kat5c" value="{{Request::old('kat5c')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">d.	Hubungan dengan relasi perusahaan</label>
               <div class="col-md-2 @if ($errors->has('kat5d')) has-error @endif">
                   <input type="text" class="form-control" name="kat5d" value="{{Request::old('kat5d')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">Kedisiplinan</label>
               <div class="col-md-2 @if ($errors->has('kat6')) has-error @endif">
                   <input type="text" class="form-control" name="kat6" value="{{Request::old('kat6')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">Kemandirian</label>
               <div class="col-md-2 @if ($errors->has('kat7')) has-error @endif">
                   <input type="text" class="form-control" name="kat7" value="{{Request::old('kat7')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">a.	Sikap menghadapi pekerjaan</label>
               <div class="col-md-2 @if ($errors->has('kat8a')) has-error @endif">
                   <input type="text" class="form-control" name="kat8a" value="{{Request::old('kat8a')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">b.	Loyalitas / kesetiaan</label>
               <div class="col-md-2 @if ($errors->has('kat8b')) has-error @endif">
                   <input type="text" class="form-control" name="kat8b" value="{{Request::old('kat8b')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">c.	Semangat / motivasi kerja</label>
               <div class="col-md-2 @if ($errors->has('kat8c')) has-error @endif">
                   <input type="text" class="form-control" name="kat8c" value="{{Request::old('kat8c')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">d.	Penampilan</label>
               <div class="col-md-2 @if ($errors->has('kat8d')) has-error @endif">
                   <input type="text" class="form-control" name="kat8d" value="{{Request::old('kat8d')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>
          <div class="form-group">
               <label class="col-md-4 control-label">Jumlah</label>
               <div class="col-md-2 @if ($errors->has('katJml')) has-error @endif">
                   <input type="text" class="form-control" name="katJml" value="{{Request::old('katJml')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>
          <div class="form-group">
               <label class="col-md-4 control-label">Rata-rata</label>
               <div class="col-md-2 @if ($errors->has('katRata')) has-error @endif">
                   <input type="text" class="form-control" name="katRata" value="{{Request::old('katRata')}}" placeholder="Nilai 0-100">
                   <small class="help-block"></small>
               </div>
           </div>

          <div class="form-group">
               <label class="col-md-4 control-label">Keterangan</label>
               <div class="col-md-6 @if ($errors->has('keterangan')) has-error @endif">
                   <textarea class="form-control" name="keterangan" value="{{Request::old('keterangan')}}" placeholder=""></textarea>
                   <small class="help-block"></small>
               </div>
           </div>




            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('RolePembLap\RolePembLapController@nilaipemblap') }}}" title="Cancel">
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
