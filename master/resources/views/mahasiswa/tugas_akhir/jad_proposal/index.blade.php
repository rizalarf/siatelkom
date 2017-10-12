@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<!--DataTables Sample [ SAMPLE ]-->
<script src="{{ url('admin') }}/js/demo/tables-datatables.js"></script>
@endpush

@section('breadcrumb')
@stop

<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Jadwal Sidang</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Jadwal Sidang</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Jadwal Sidang Proposal</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Tanggal Sidang</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Detail</th>
                <!--<th>Reviewer I</th>
                <th>Reviewer II</th>
                <th>Reviewer III</th>
                <th>Pembimbing I</th>
                <th>Pembimbing II</th>-->
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
@endsection
