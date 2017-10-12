@extends('admin.layouts.master')
@section('breadcrumb')
<h1>
  Laporan Harian
  <!-- <small>Menu</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="main"><i class="fa fa-home"></i> Beranda</a></li>
  <li><a href="active">Laporan Harian</a></li>
</ol>
@stop

<!-- Main content -->
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Laporan Harian</h3>
        </div>
        <div class="box-body">
          <table id="dataMahasiswa" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Hari, Tanggal</th>
                <th>Kegiatan</th>
                <th>Komentar</th>
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

@section('script')
<script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#dataMahasiswa').DataTable({"pageLength": 10});
  });
</script>
@endsection
