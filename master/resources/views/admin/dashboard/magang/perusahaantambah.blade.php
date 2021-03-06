@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Perusahaan</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Magang</li>
      <li><a href="{{{ action('Perusahaan\PerusahaanController@index') }}}">Data Perusahaan</a></li>
      <li class="active">Tambah Perusahaan</li>
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
            <h3 class="box-title">Tambah Perusahaan</h3>
          </div>
          <div class="box-body">
            <form id="formPerusahaanTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/perusahaan/tambahperusahaan') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">Nama Perusahaan </label>
                    <div class="col-md-6 @if ($errors->has('perusNama')) has-error @endif">
                      <input type="text" class="form-control" name="perusNama" value="{{Request::old('perusNama')}}" placeholder="Enter Nama Perusahaan">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Alamat </label>
                    <div class="col-md-6  @if ($errors->has('perusAlamat')) has-error @endif">
                      <textarea class="form-control" name="perusAlamat" value="{{Request::old('perusAlamat')}}" placeholder="Enter Alamat"></textarea>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Kontak </label>
                    <div class="col-md-6 @if ($errors->has('perusKontak')) has-error @endif">
                      <input type="text" class="form-control" name="perusKontak" value="{{Request::old('perusKontak')}}" placeholder="Enter Kontak">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Email </label>
                    <div class="col-md-6  @if ($errors->has('perusEmail')) has-error @endif">
                      <input type="text" class="form-control" name="perusEmail" value="{{Request::old('perusEmail')}}" placeholder="Enter Email">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('Perusahaan\PerusahaanController@index') }}}" title="Cancel">
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
