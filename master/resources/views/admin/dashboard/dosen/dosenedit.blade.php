@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Dosen</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data User</li>
      <li><a href="{{{ action('Dosen\DosenController@index') }}}">Data Dosen</a></li>
      <li class="active">Edit Dosen</li>
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
            <h3 class="box-title">{{$dosNama}} - Edit</h3>
          </div>
            <div class="box-body">
              <form id="formDosenEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/dosen/'.$id.'/simpanedit') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$id}}" >

                  <!--<div class="form-group">
                    <label class="col-md-4 control-label">ID</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="id" value="{{$id}}" disabled="true">
                      <small class="help-block"></small>
                    </div>
                  </div>-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">NIP </label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="dosNip" value="{{$dosNip}}">
                        <small class="help-block"></small>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Nama </label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="dosNama" value="{{$dosNama}}">
                        <small class="help-block"></small>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Email </label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="dosEmail" value="{{$dosEmail}}">
                        <small class="help-block"></small>
                      </div>
                  </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Kontak </label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="dosKontak" value="{{$dosKontak}}">
                      <small class="help-block"></small>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                      </button>
                      <a href="{{{ action('Dosen\DosenController@index') }}}" title="Cancel">
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
