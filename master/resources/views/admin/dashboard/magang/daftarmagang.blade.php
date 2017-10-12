@extends('admin.layouts.master')

@section('breadcrumb')
<h1>
  Magang
</h1>
<ol class="breadcrumb">
  <li><a href="main"><i class="fa fa-home"></i> Beranda</a></li>
  <li><a href="#">Data Magang</a></li>
  <li class="active">Daftar Magang</li>
</ol>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Daftar Magang</h3>
      </div>

      <div class="box-body">
        <table id="dataMakulKurikulum" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Perusahaan</th>
              <th>Mahasiswa</th>
              <th>Tahun</th>
              <th>Periode</th>
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
    $('#dataMakulKurikulum').DataTable({"pageLength": 50});
  });
</script>
@endsection
