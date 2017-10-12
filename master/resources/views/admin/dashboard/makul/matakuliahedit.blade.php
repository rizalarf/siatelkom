@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Mata Kuliah</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Kurikulum</li>
      <li><a href="{{{ action('Matakuliah\MatakuliahController@index') }}}">Data Mata Kuliah</a></li>
      <li class="active">Edit</li>
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
            <h3 class="box-title">{{$data->makulNama}} - Edit</h3>
          </div>
          <div class="box-body">
            <form id="formMatakuliahEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/matakuliah/'.$data->id.'/simpanedit') }}"><!--Tampilan form pengisian-->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="{{$data->id}}" >

                <!--<div class="form-group">
                  <label class="col-md-4 control-label">ID</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="id" value="{{$data->id}}" disabled="true">
                      <small class="help-block"></small>
                    </div>
                </div>-->
                <!--Untuk menambahkan kolom ID jika ingin ditampilkan (tapi tidak perlu) -->
                <div class="form-group">
                  <label class="col-md-4 control-label">Kode Mata Kuliah</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="makulKode" value="{{$data->makulKode}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Mata Kuliah</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="makulNama" value="{{$data->makulNama}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Kurikulum</label>
                    <div class="col-md-6">
                      <select class="form-control" name="idKur">
                        <option value="">-- Pilih Kurikulum --</option>
                          @foreach ($kurikulum as $item)
                            @if ($item->id == $data->idKur)
                              <option value="{{$item->id}}" selected>{{$item->kurNama}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->kurNama}}</option>
                            @endif
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Semester</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="makulSemester" value="{{$data->makulSemester}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jumlah SKS</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="makulSks" value="{{$data->makulSks}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jumlah Jam</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="makulJam" value="{{$data->makulJam}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jenis Mata Kuliah</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="makulJenis" value="{{$data->makulJenis}}">
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('Matakuliah\MatakuliahController@index') }}}" title="Cancel">
                      <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
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
