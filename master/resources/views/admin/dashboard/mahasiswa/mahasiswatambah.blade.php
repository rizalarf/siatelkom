@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Mahasiswa</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data User</li>
      <li><a href="{{{ action('Mahasiswa\MahasiswaController@index') }}}">Data Mahasiswa</a></li>
      <li class="active">Tambah Mahasiswa</li>
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
            <h3 class="box-title">Tambah Mahasiswa</h3>
          </div>
          <div class="box-body">
            <form id="formMahasiswaTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/mahasiswa/tambahmahasiswa') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">NIM </label>
                    <div class="col-md-6  @if ($errors->has('mhsNim')) has-error @endif">
                      <input type="text" class="form-control" name="mhsNim" value="{{Request::old('mhsNim')}}" placeholder="Enter NIM">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6 @if ($errors->has('mhsNama')) has-error @endif">
                      <input type="text" class="form-control" name="mhsNama" value="{{Request::old('mhsNama')}}" placeholder="Enter Nama">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Email</label>
                    <div class="col-md-6 @if ($errors->has('mhsEmail')) has-error @endif">
                      <input type="text" class="form-control" name="mhsEmail" value="{{Request::old('mhsEmail')}}" placeholder="Enter Email">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Kontak</label>
                    <div class="col-md-6 @if ($errors->has('mhsKontak')) has-error @endif">
                      <input type="text" class="form-control" name="mhsKontak" value="{{Request::old('mhsKontak')}}" placeholder="Enter Kontak">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Kelas </label>
                    <div class="col-md-6 @if ($errors->has('idDosen')) has-error @endif">
                      <select class="form-control" name="idKelas">
                        <option value="">-- Pilih Nama kelas --</option>
                          @foreach ($kelas as $item)
                            <option value="{{$item->id}}">{{$item->klsNama}}</option>
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                      Save
                    </button>
                    <a href="{{{ action('Mahasiswa\MahasiswaController@index') }}}" title="Cancel">
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
