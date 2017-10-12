@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('admin') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
$(document).ready(function () {
  $('#timepicker1').timepicker({
    minuteStep: 1,
    showMeridian: false,
  });
  $('#timepicker2').timepicker({
    minuteStep: 1,
    showMeridian: false,
  });
  $('#timepicker3').timepicker({
    minuteStep: 1,
    showMeridian: false,
  });
});
</script>
@endpush
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Jam</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data Jadwal</li>
    <li><a href="{{{ action('Jam\JamController@index') }}}">Data Jam</a></li>
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
            <h3 class="box-title">Jam Ke {{$jmKode}} - Edit</h3>
          </div>
          <div class="box-body">
            <form id="formJamEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/jam/'.$id.'/simpanedit') }}"><!--Tampilan form pengisian-->
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
                  <label class="col-md-4 control-label">Kode Jam</label>
                    <div class="col-md-4" style="width: 21%;">
                      <input type="text" class="form-control" name="jmKode" value="{{$jmKode}}">
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jam Mulai </label>
                    <div class="col-md-6">
                      <div class="input-group">
                        <div class='bootstrap-timepicker timepicker'>
                          <input id="timepicker1" type="text" class="form-control" name="jmMulai" value="{{$jmMulai}}">
                        </div>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Jam Selesai </label>
                    <div class="col-md-6">
                      <div class="input-group">
                        <div class='bootstrap-timepicker timepicker'>
                          <input id="timepicker2" type="text" class="form-control" name="jmSelesai" value="{{$jmSelesai}}">
                        </div>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Range Jam</label>
                    <div class="col-md-6">
                      <div class="input-group">
                        <div class='bootstrap-timepicker timepicker'>
                          <input id="timepicker3" type="text" class="form-control" name="jmRange" value="{{$jmRange}}">
                        </div>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('Jam\JamController@index') }}}" title="Cancel">
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
