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
    <li class="active">Tugas Akhir</li>
    <li class="active">Data Surat Tugas</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Surat Tugas</h3>
      </div>

      <div class="box-body">
        <table id="demo-dt-basic" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <!-- <th>Tanggal</th> -->
              <!-- <th>Waktu</th> -->
              <!-- <th>Tempat</th> -->
              <!-- <th>Ketua Penguji</th> -->
              <!-- <th>Sekretaris Penguji</th> -->
              <!-- <th>Penguji 1</th> -->
              <!-- <th>Penguji 2</th> -->
              <!-- <th>Penguji 3</th> -->
              <!-- <th>Pembimbing Utama</th> -->
              <!-- <th>Pembimbing Pendamping</th> -->
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($tugas as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul}}</td>
              <!-- <td>{{ $item->stTglSid}}</td> -->
              <!-- <td>{{ $item->stWktSid}}</td> -->
              <!-- <td>{{ $item->ruangNama}}</td> -->
              <!-- <td>{{ $item->idDosbing1}}</td> -->
              <!-- <td>{{ $item->stPS}}</td> -->
              <!-- <td>{{ $item->stP1}}</td> -->
              <!-- <td>{{ $item->stP2}}</td> -->
              <!-- <td>{{ $item->stP3}}</td> -->
              <!-- <td>{{ $item->idDosbing1}}</td> -->
              <!-- <td>{{ $item->idDosbing2}}</td> -->
              <td>
                <a href="{{{ URL::to('surat-tugas/'.$item->id.'/view') }}}" class="btn btn-info btn-icon icon-lg fa fa-info"></a>
              </td>
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
