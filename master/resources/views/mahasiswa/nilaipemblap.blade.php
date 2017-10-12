@extends('admin.layouts.master')
@section('breadcrumb')
<h1>
  Nilai Pembimbing Lapangan
  <!-- <small>Menu</small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="main"><i class="fa fa-home"></i> Beranda</a></li>
  <li><a href="active">Nilai Magang</a></li>
  <li><a href="active">Nilai Pembimbing Lapangan</a></li>
</ol>
@stop

<!-- Main content -->
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nilai Pembing Lapangan</h3>
        </div>
        <div class="box-body">
          <table id="dataMahasiswa" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Komponen Yang Dinilai</th>
                <th>Nilai</th>
                <th>Keterangan</th>
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
