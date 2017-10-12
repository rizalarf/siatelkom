@extends('admin.layouts.master')
@push('style')
<!--  -->
@endpush
@push('javascript')
<!--  -->
@endpush

@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Laporan Sidang</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Laporan Sidang</h3>
      </div>
      <div class="box-body">
        <a href="{{ url('laporan-dosen/create') }}" class="btn btn-success btn-flat btn-sm"><span class="fa fa-plus"></span> Laporan Sidang</a>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <th>Ruang Ujian</th>
              <th>Nilai Bimbingan</th>
              <th>Nilai Ujian</th>
              <th>Nilai Akhir</th>
              <th>Hasil Akhir</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($laporan as $item)
            <tr>
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul }}</td>
              <td>{{ $item->ruangNama }}</td>
              <td>{{ $item->nilBimb}}</td>
              <td>{{ $item->nilUji }}</td>
              <td>{{ $item->nilAkhir}}</td>
              <td>{{ $item->hasilAkhir}}</td>
              <td>
                <a href="{{{ action('RoleDsn\RoleDsnController@destroyLaporan', [$item->id]) }}}" class="btn btn-danger btn-icon icon-lg fa fa-trash" title="Delete"></a>
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
