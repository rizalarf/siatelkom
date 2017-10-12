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

@section('content')
<div class="content-header">
  <h1>Manajemen Progress</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="active">Manajemen Progress</a></li>
  </ol>
</div>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Progress Tugas Akhir</h3>
        </div>
        <div class="box-body">
          <a href="{{ url('#') }}" class="btn btn-success btn-flat btn-sm"><span class="fa fa-plus"></span> Tambah Progres</a>
        </div>
        <div class="box-body">
          <table id="demo-dt-basic" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Keterangan</th>
                <th width="25%" colspan="2">Progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>4.31.13.1.13</td>
                <td>Muhammad Rizal Ariffiansyah</td>
                <td>SIA Tugas Akhir</td>
                <td>Menyelesaikan Bab 2</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                  </div>
                </td>
                <td width="5%"><span class="badge bg-light-blue pull-right">30%</span></td>
              </tr>
            </tbody>

          </table>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- /.content -->
</div>
@endsection
