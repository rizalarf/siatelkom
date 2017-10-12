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
    <li class="active">Hasil Sidang</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Hasil Sidang</h3>
        </div>
        <div class="box-body">
          <table id="demo-dt-basic" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Judul</th>
                <th>Nilai Bimbingan</th>
                <th>Nilai Ujian</th>
                <th>Nilai Akhir</th>
                <th>Hasil Akhir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($laporan as $item)
              <tr>
                <td>{{ $item->mhsNim }}</td>
                <td>{{ $item->mhsNama }}</td>
                <td>{{ $item->jdJudul }}</td>
                <td>{{ $item->nilBimb }}</td>
                <td>{{ $item->nilUji }}</td>
                <td>{{ $item->nilAkhir }}</td>
                <td>{{ $item->hasilAkhir }}</td>
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
