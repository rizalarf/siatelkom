@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap/cssc/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ url('admin') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link  href="{{ url('admin') }}/bower_components/select2/dist/css/select2.min.css"rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('admin') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('admin') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="{{ url('admin') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{ url('admin') }}/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ url('admin') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('admin') }}/bower_components/moment/min/moment.min.js"></script>
<script src="{{ url('admin') }}/jquery/dist/jquery.min.js"></script>
<script src="{{ url('admin') }}/plugins/checknew/iCheck/icheck.min.js"></script>
<script src="{{ url('admin') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="{{ url('admin') }}/dist/jss/demo.js"></script>
<script>
$(document).ready(function () {
  $.fn.datepicker.defaults.format = 'dd-mm-yyyy';
  $('.datepicker-me').datepicker({
    //format: 'dd-mm-yyyy',
  });
  $('#timepicker1').timepicker({
    minuteStep: 1,
    showMeridian: false,
  });
});
</script>
<script>
$(function () {
  $('#datepicker').datepicker({
    autoclose: true
  })
    $('#reservation').daterangepicker()
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  })
    </script>
@endpush
@section('content')
<div class="content-header">
  <h1>Kaprodi</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data User</li>
    <li><a href="{{{ action('Kaprodi\KaprodiController@index') }}}">Data Kaprodi</a></li>
    <li class="active">Tambah Kaprodi</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Kaprodi</h3>
        </div>

        <div class="box-body">

          <div class="form-group">
            <label class="col-md-4 control-label">Tanggal Mulai Menjabat</label>
            <div class="input-group">
              <div class="input-group date" data-provide='datepicker' style="width: 200%;">
                <input type="text" class="form-control datepicker-me">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Minimal</label>
            <select class="form-control select2" name="idProdi" value="{{Request::old('idProdi')}}" placeholder="Enter Program Studi" style="width: 50%;">
              <option selected="selected"></option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
          </div>

          <div class="form-group">
            <label>Date:</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <div class="form-group">
            <label class="col-md-4 control-label">Jam Berapa Sekarang</label>
            <div class="input-group">
              <div class='bootstrap-timepicker timepicker'>
                <input id="timepicker1" type="text" class="form-control">
              </div>
            </div>
          </div>

          <!-- Date range -->
          <div class="form-group">
            <label>Date range:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- Date and time range -->
          <div class="form-group">
            <label>Date and time range:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservationtime">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- Date and time range -->
          <div class="form-group">
            <label>Date range button:</label>

            <div class="input-group">
              <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                <span>
                  <i class="fa fa-calendar"></i> Date range picker
                </span>
                <i class="fa fa-caret-down"></i>
              </button>
            </div>
          </div>
          <!-- /.form group -->

          <!-- checkbox -->
          <div class="form-group">
            <label>
              <input type="checkbox" class="flat-red" checked>
            </label>
            <label>
              <input type="checkbox" class="flat-red">
            </label>
            <label>
              <input type="checkbox" class="flat-red" disabled>
              Flat green skin checkbox
            </label>
          </div>

        </div> <!-- /box-body -->

      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection
