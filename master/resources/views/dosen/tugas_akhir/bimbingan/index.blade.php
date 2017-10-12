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

<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Bimbingan</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Tugas Akhir</li>
    <li class="active">Bimbingan</li>
    <li class="active">Kontrol Bimbingan</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Kontrol Bimbingan Tugas Akhir</h3>
        </div>
        <div class="box-body">
        </div>
        <div class="box-body">
          <table id="demo-dt-basic" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="15%">Nama Mahasiswa</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Minggu</th>
                <th>Uraian</th>
                <th>Komentar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bimbingan as $item)
              <tr>
                <td>{{ $item->mhsNama }}</td>
                <td>{{ $item->jdJudul }}</td>
                <td>{{ $item->bbTanggal }}</td>
                <td>{{ $item->bbMinggu }}</td>
                <td>{{ $item->bbUraian }}</td>
                <td>{{ $item->bbKomen }}</td>
                <td>
                  <a href="{{ url('dosen-bimbingan/'.$item->id.'/edit') }}" class="btn btn-primary btn-icon icon-lg fa fa-comments-o"></a>
                  <!-- <a href="#" class="btn btn-danger btn-icon icon-lg fa fa-close"> Belum Konfirmasi</a> -->
                </td>
              </tr>
              @endforeach
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
