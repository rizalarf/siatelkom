@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Pengampu</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Jadwal</li>
      <li><a href="{{{ action('Pengampu\PengampuController@index') }}}">Data Pengampu</a></li>
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
            <h3 class="box-title">{{$namaDosen}} - Edit</h3>
          </div>
            <div class="box-body">
              <form id="formPengampuEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/pengampu/'.$data->id.'/simpanedit') }}">
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

                  <div class="form-group">
                    <label class="col-md-4 control-label">Nama Pengampu </label>
                      <div class="col-md-6">
                        <select class="form-control" name="idDosen">
                          <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosen as $item)
                              @if ($item->id == $data->idDosen)
                                <option value="{{$item->id}}" selected>{{$item->dosNama}}</option>
                              @else
                                <option value="{{$item->id}}">{{$item->dosNama}}</option>
                              @endif
                            @endforeach
                        </select>
                        <small class="help-block"></small>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Nama Mata kuliah </label>
                      <div class="col-md-6">
                        <select class="form-control" name="idMakul">
                          <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach ($makul as $item)
                              @if ($item->id == $data->idMakul)
                                <option value="{{$item->id}}" selected>{{$item->makulNama}}</option>
                              @else
                                <option value="{{$item->id}}">{{$item->makulNama}}</option>
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
                    <a href="{{{ action('Pengampu\PengampuController@index') }}}" title="Cancel">
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
