@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Kurikulum</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Kurikulum</li>
      <li><a href="{{{ action('Kurikulum\KurikulumController@index') }}}">Data Kurikulum</a></li>
      <li class="active">Tambah Kurikulum</li>
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
            <h3 class="box-title">Tambah Kurikulum</h3>
          </div>
          <div class="box-body">
            <form id="formKurikulumTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/kurikulum/tambahkurikulum') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">Kode Kurikulum </label>
                    <div class="col-md-6 @if ($errors->has('kurKode')) has-error @endif">
                      <input type="text" class="form-control" name="kurKode" value="{{Request::old('kurKode')}}" placeholder="Enter Kode Kurikulum">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Kurikulum </label>
                    <div class="col-md-6 @if ($errors->has('kurNama')) has-error @endif">
                      <input type="text" class="form-control" name="kurNama" value="{{Request::old('kurNama')}}" placeholder="Enter Nama Kurikulum">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Program Studi </label>
                    <div class="col-md-6  @if ($errors->has('idProdi')) has-error @endif">
                      <select class="form-control" name="idProdi">
                        <option value="">-- Pilih Program Studi --</option>
                          @foreach ($programstudi as $item)
                            <option value="{{$item->id}}">{{$item->prodiNama}}</option>
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Tahun Kurikulum </label>
                    <div class="col-md-6 @if ($errors->has('kurTahun')) has-error @endif">
                      <input type="text" class="form-control" name="kurTahun" value="{{Request::old('kurTahun')}}" placeholder="Enter Tahun Kurikulum">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">SK Kurikulum </label>
                    <div class="col-md-6 @if ($errors->has('kurSk')) has-error @endif">
                      <input type="text" class="form-control" name="kurSk" value="{{Request::old('kurSk')}}" placeholder="Enter SK Kurikulum">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('Kurikulum\KurikulumController@index') }}}" title="Cancel">
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
