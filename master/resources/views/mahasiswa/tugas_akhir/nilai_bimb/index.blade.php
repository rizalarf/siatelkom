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
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Nilai Bimbingan</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nilai Bimbingan</h3>
        </div>
        <div class="box-body">
          <table id="demo-dt-basic" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Nama Pembimbing</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($nilai as $item)
              <tr>
                <td>{{ $item->mhsNim }}</td>
                <td>{{ $item->mhsNama }}</td>
                <td>{{ $item->dosNama }}</td>
                <td>{{ $item->npJumlah }}</td>
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
