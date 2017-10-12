@extends('admin.layouts.master')

@section('breadcrumb')
<h1>
  Akun Pembimbing Lapangan
</h1>
<ol class="breadcrumb">
  <li><a href="main"><i class="fa fa-home"></i> Beranda</a></li>
  <li class="active">Manajemen User</li>
  <li class="active">Akun Pembimbing Lapangan</li>
</ol>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Daftar Akun Pembimbing Lapangan</h3><br><br>
        <a href="#" class="btn btn-success btn-flat btn-sm" title="Tambah"><i class="fa fa-plus"></i> Tambah Akun</a>
      </div>

      <div class="box-body">
        <table id="dataKurikulum" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIK</th>
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
