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
  <h1>Dokumen</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Dokumen</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Dokumen Sidang Akhir</h3>
        </div>
        <div class="panel-body">
          <table id="demo-dt-basic" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Dokumen</th>
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
