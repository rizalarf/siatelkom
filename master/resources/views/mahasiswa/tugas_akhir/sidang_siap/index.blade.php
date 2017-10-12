@extends('admin.layouts.master')

<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Tugas AKhir</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Siap Sidang</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Siap Sidang Tugas Akhir</h3>
        </div>
        <div class="box-body">
          <a href="{{ url('siap-sidang/create') }}" class="btn btn-success btn-flat btn-sm"><span class="fa fa-plus"></span> Siap Sidang</a>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <!-- <th>Kelas</th> -->
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($siap as $item)
              <tr>
                <td>{{ $item->mhsNim }}</td>
                <td>{{ $item->mhsNama }}</td>
                <td>{{ $item->ssTanggal }}</td>
                <td>
                  <a href="#" class="btn btn-success btn-icon icon-lg fa fa-print"> Cetak</a>
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
