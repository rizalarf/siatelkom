@extends('admin.layouts.master')
@push('style')
<!--  -->
@endpush
@push('javascript')
<!--  -->
@endpush

<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Judul Tugas Akhir</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Judul Tugas Akhir</h3>
          @if ($count < 1)
          <a href="{{ url('proposal/create') }}" class="btn btn-success btn-flat btn-sm" title="Tambah Judul"><i class="fa fa-plus"></i></a>
          @endif
        </div>
        <div class="box-body">
          <table id="" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Dokumen</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($judul as $item)
              <tr>
                <td>{{ $item->mhsNim }}</td>
                <td>{{ $item->mhsNama }}</td>
                <td>{{ $item->jdJudul }}</td>
                <td>{{ $item->jdTahun }}</td>
                <td>{{ $item->jdProposal }}</td>
                <td>
                  @if ($item->jdStatus == 'ditolak')
                  <span class="label label-danger">{{ $item->jdStatus }}</span>
                  <!-- <span class="label label-warning">23-08-2017</span> -->
                  @elseif ($item->jdStatus == 'diterima')
                  <span class="label label-success">{{ $item->jdStatus }}</span>
                  @elseif ($item->jdStatus == 'direview')
                  <span class="label label-info">{{ $item->jdStatus }}</span>
                  @elseif ($item->jdStatus == 'diajukan')
                  <span class="label label-warning">{{ $item->jdStatus }}</span>
                  @endif
                </td>
                @if ($item->jdStatus != 'ditolak')
                <td>
                  <a href="{{{ URL::to('proposal/'.$item->id.'/edit') }}}" class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"></a>
                </td>
                @endif
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
