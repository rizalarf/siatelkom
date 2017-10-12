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
    <li class="active">Revisi</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Revisi</h3>
      </div>
      <div class="box-body">
        <a href="{{ url('revisi-dosen/create') }}" class="btn btn-success btn-flat btn-sm"><span class="fa fa-plus"></span> Revisi</a>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <!-- <th>No.</th> -->
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>Revisi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($revisi as $item)
            <tr>
              <!-- <td>1.</td> -->
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul }}</td>
              <td>{{ $item->revTanggal }}</td>
              <td>{{ $item->revUraian }}</td>
              <td>
                <a href="{{{ action('RoleDsn\RoleDsnController@destroyRevisi', [$item->id]) }}}" class="btn btn-danger btn-icon icon-lg fa fa-trash" title="Delete"></a>
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
