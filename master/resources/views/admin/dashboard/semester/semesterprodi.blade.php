@extends('admin.layouts.master')

@section('breadcrumb')
<h1>
  Kurikulum
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
  <li class="active">Kurikulum</li>
  <li class="active">Semester Prodi</li>
</ol>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Semester Prodi</h3>
      </div>
      <div class="box-header">
        <div class="col-md-12" align="right">
          <a href="#" title="Registrasi Semua Prodi->Semester Prodi" onclick="return confirm('Apakah Anda yakin akan meregistrasikan semua Program Studi pada Semester Prodi sesuai dengan Semester Aktif ?')">
            <span class="btn btn-info"><i class="fa fa-list"> Registrasikan Semua Program Studi</i></span>
          </a>
        </div>
      </div>
      <div class="box-body">
        <table id="dataSemesterProdi" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode Semester</th>
              <th>Prodi</th>
              <th>Tgl Mulai KRS</th>
              <th>Tgl Selesai KRS</th>
              <th>Mulai Input Nilai</th>
              <th>Selesai Input Nilai</th>
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
    $('#dataSemesterProdi').DataTable({"pageLength": 50});
  });
</script>
@endsection
