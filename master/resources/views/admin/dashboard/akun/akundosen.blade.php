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

@section('content')
<div class="content-header">
  <h1>Manajemen User</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Manajemen User</li>
    <li class="active">Akun Dosen</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Akun Dosen</h3><br><br>
        <a href="#" class="btn btn-success btn-flat btn-sm" title="Tambah"><i class="fa fa-plus"></i> Tambah Akun</a>
      </div>

      <div class="box-body">
        <table id="dataKurikulum" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Email</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>

        </table>

      </div>

    </div>

  </div>

</div>
</section>

@endsection
