@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Pembimbing Lapangan</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data User</li>
      <li><a href="{{{ action('PembLap\PembLapController@index') }}}">Data Pembimbing Lapangan</a></li>
      <li class="active">Tambah Pembimbing Lapangan</li>
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
            <h3 class="box-title">Tambah Pembimbing Lapangan</h3>
          </div>
          <div class="box-body">
            <form id="formPembLapTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/pemblap/tambahpemblap') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">NIK </label>
                    <div class="col-md-6  @if ($errors->has('pembNik')) has-error @endif">
                      <input type="text" class="form-control" name="pembNik" value="{{Request::old('pembNik')}}" placeholder="Enter NIK">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6 @if ($errors->has('pembNama')) has-error @endif">
                      <input type="text" class="form-control" name="pembNama" value="{{Request::old('pembNama')}}" placeholder="Enter Nama">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Email</label>
                    <div class="col-md-6 @if ($errors->has('pembEmail')) has-error @endif">
                      <input type="text" class="form-control" name="pembEmail" value="{{Request::old('pembEmail')}}" placeholder="Enter Email">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Kontak</label>
                    <div class="col-md-6 @if ($errors->has('pembKontak')) has-error @endif">
                      <input type="text" class="form-control" name="pembKontak" value="{{Request::old('pembKontak')}}" placeholder="Enter Kontak">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Perusahaan</label>
                    <div class="col-md-6 @if ($errors->has('idPerus')) has-error @endif">
                      <select class="form-control" name="idPerus">
                        <option value="">-- Pilih Perusahaan --</option>
                          @foreach ($perusahaan as $item)
                            <option value="{{$item->id}}">{{$item->perusNama}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                      Save
                    </button>
                    <a href="{{{ action('PembLap\PembLapController@index') }}}" title="Cancel">
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
