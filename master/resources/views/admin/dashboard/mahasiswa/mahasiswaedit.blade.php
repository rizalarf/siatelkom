@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Mahasiswa</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data User</li>
    <li class="active">Data Mahasiswa</a></li>
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
          <h3 class="box-title">{{ $data->mhsNama }} - Edit</h3>
        </div>
        <div class="box-body">
          <form id="formMahasiswaEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/mahasiswa/'.$data->id.'/simpanedit') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $data->id }}" >

            <div class="form-group">
              <label class="col-md-4 control-label">NIM </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="mhsNim" value="{{$data->mhsNim}}">
                <small class="help-block"></small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Nama </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="mhsNama" value="{{$data->mhsNama}}">
                <small class="help-block"></small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Email </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="mhsEmail" value="{{$data->mhsEmail}}">
                <small class="help-block"></small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Kontak </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="mhsKontak" value="{{$data->mhsKontak}}">
                <small class="help-block"></small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Kelas</label>
              <div class="col-md-6">
                <select class="form-control" name="idKelas">
                  <option value="">-- Pilih Kelas --</option>
                  @foreach ($kelas as $item)
                  @if ($item->id == $data->idKelas)
                  <option value="{{$item->id}}" selected>{{$item->klsNama}}</option>
                  @else
                  <option value="{{$item->id}}">{{$item->klsNama}}</option>
                  @endif
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
                  <span class="btn btn-default"><i class="fa fa-back"> Cancel</i></span>
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
