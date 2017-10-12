@extends('admin.layouts.master')

@section('breadcrumb')
<h1>
  Semester
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
  <li class="active">Semester</li>
  <li class="active">Manajemen Semester</li>
</ol>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manajemen Semester</h3><br><br>
        <a href="#" class="btn btn-success btn-flat btn-sm" title="Tambah"><i class="fa fa-plus"></i> Tambah Semester</a>
      </div>

      <div class="box-body">
        <table id="dataKurikulum" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode Semester</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Tahun</th>
              <th>Tipe (Ganjil/Genap)</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

        </table>

      </div>

    </div>

  </div>

</div>

@endsection
@section('script')
<script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $(function () {
    $('#dataKurikulum').DataTable({"pageLength": 50});
  });
</script>
@endsection
