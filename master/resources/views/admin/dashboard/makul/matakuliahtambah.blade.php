@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Mata Kuliah</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Kurikulum/li>
      <li><a href="{{{ action('Matakuliah\MatakuliahController@index') }}}">Data Mata Kuliah</a></li>
      <li class="active">Tambah Mata Kuliah</li>
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
            <h3 class="box-title">Tambah Mata Kuliah</h3>
          </div>
          <div class="box-body">
            <form id="formMatakuliahTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/matakuliah/tambahmatakuliah') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">Kode Mata Kuliah </label>
                    <div class="col-md-6  @if ($errors->has('makulKode')) has-error @endif">
                      <input type="text" class="form-control" name="makulKode" value="{{Request::old('makulKode')}}" placeholder="Enter Kode Mata Kuliah">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Mata Kuliah</label>
                    <div class="col-md-6 @if ($errors->has('makulNama')) has-error @endif">
                      <input type="text" class="form-control" name="makulNama" value="{{Request::old('makulNama')}}" placeholder="Enter Nama">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Kurikulum</label>
                    <div class="col-md-6 @if ($errors->has('idKur')) has-error @endif">
                      <select class="form-control" name="idKur">
                        <option value="">-- Pilih Nama Kurikulum --</option>
                          @foreach ($kurikulum as $item)
                            <option value="{{$item->id}}">{{$item->kurNama}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Semester</label>
                    <div class="col-md-6 @if ($errors->has('makulSemester')) has-error @endif">
                      <select class="form-control" name="makulSemester">
                        <option value="">-- Pilih Semester --</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="1">Semester 5</option>
                        <option value="2">Semester 6</option>
                        <option value="3">Semester 7</option>
                        <option value="4">Semester 8</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jumlah SKS</label>
                    <div class="col-md-6 @if ($errors->has('makulSks')) has-error @endif">
                      <select class="form-control" name="makulSks">
                        <option value="">-- Pilih Jumlah SKS --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jumlah Jam</label>
                    <div class="col-md-6 @if ($errors->has('makulJam')) has-error @endif">
                      <select class="form-control" name="makulJam">
                        <option value="">-- Pilih Jumlah Jam --</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jenis Mata Kuliah</label>
                    <div class="col-md-6 @if ($errors->has('makulJenis')) has-error @endif">
                      <select class="form-control" name="makulJenis">
                        <option value="">-- Pilih Jenis Mata Kuliah --</option>
                        <option value="Teori">Teori</option>
                        <option value="Praktek">Praktek</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                      Save
                    </button>
                    <a href="{{{ action('Matakuliah\MatakuliahController@index') }}}" title="Cancel">
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
