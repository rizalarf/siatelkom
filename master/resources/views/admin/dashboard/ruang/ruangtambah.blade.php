@extends('admin.layouts.master')
<!--main content-->
@section('content')
<div class="content-header">
  <h1>Ruang</h1>
  <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Jadwal</li>
      <li><a href="{{{ action('Ruang\RuangController@index') }}}">Data Ruang</a></li>
      <li class="active">Tambah Ruang</li>
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
            <h3 class="box-title">Tambah Ruang</h3>
          </div>
          <div class="box-body">
            <form id="formRuangTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/ruang/tambahruang') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">Nama Ruang </label>
                    <div class="col-md-6 @if ($errors->has('ruangNama')) has-error @endif">
                      <input type="text" class="form-control" name="ruangNama" value="{{Request::old('ruangNama')}}" placeholder="Enter Nama Ruang">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jenis Ruang </label>
                  <div class="col-md-6  @if ($errors->has('ruangJenis')) has-error @endif">
                    <select class="form-control" name="ruangJenis">
                      <option value="">-- Pilih Jenis Ruang --</option>
                      <option value="Teori">Teori</option>
                      <option value="Praktek">Praktek</option>
                      <option value="Teori / Praktek">Teori / Praktek</option>
                    </select>
                    <small class="help-block"></small>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                      Save
                    </button>
                    <a href="{{{ action('Ruang\RuangController@index') }}}" title="Cancel">
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
