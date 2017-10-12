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
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Rekapitulasi Nilai Ujian</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Rekapitulasi Nilai Ujian</h3>
      </div>
      <div class="box-body">
        <table id="demo-dt-basic" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <th>Nilai Penguji 1</th>
              <th>Nilai Penguji 2</th>
              <th>Nilai Penguji 3</th>
              <th>Total Nilai</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rekap as $item)
            <tr>
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul }}</td>
              <td>{{ $item->rekNilai1 }}</td>
              <td>{{ $item->rekNilai2 }}</td>
              <td>{{ $item->rekNilai3 }}</td>
              <td>{{ $item->rekTotal }}</td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</section>
</div>

@endsection
