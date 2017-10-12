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
    <li class="active">Sidang Proposal</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Sidang Proposal</h3>
      </div>
      <!-- <div class="box-body">
        <a href="{{ url('revisi-dosen/create') }}" class="btn btn-success btn-flat btn-sm"><span class="fa fa-plus"></span> Revisi</a>
      </div> -->
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <th>Tahun</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($review as $item)
            <tr>
              <!-- <td>1.</td> -->
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul }}</td>
              <td><span class="label label-primary">direview</span></td>
              <td>{{ $item->jdTahun }}</td>
              <td>
                <a href="{{{ URL::to('reviewer/'.$item->id.'/create') }}}" class="btn btn-primary">Review</a>
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
