@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Pengampu</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Jadwal</li>
      <li><a href="{{{ action('Pengampu\PengampuController@index') }}}">Data Pengampu</a></li>
      <li class="active">Tambah Pengampu</li>
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
            <h3 class="box-title">Tambah Pengampu</h3>
          </div>
          <div class="box-body">
            <form id="formPengampuTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/pengampu/tambahpengampu') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">Nama Pengampu </label>
                    <div class="col-md-6  @if ($errors->has('idDosen')) has-error @endif">
                      <select class="form-control" name="idDosen">
                        <option value="">-- Pilih Pengampu --</option>
                          @foreach ($dosen as $item)
                            <option value="{{$item->id}}">{{$item->dosNama}}</option>
                            @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Mata Kuliah</label>
                    <div class="col-md-6 @if ($errors->has('idMakul')) has-error @endif">
                      <select class="form-control" name="idMakul">
                        <option value="">-- Pilih Mata Kuliah --</option>
                          @foreach ($makul as $item)
                            <option value="{{$item->id}}">{{$item->makulNama}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                      Save
                    </button>
                    <a href="{{{ action('Pengampu\PengampuController@index') }}}" title="Cancel">
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
