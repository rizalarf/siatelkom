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
        <table class="table table-bordered table-hover">
          <tbody>
            @foreach ($tugas as $item)
            <tr>
              <td>NIM</td>
              <td>{{ $item->mhsNim}}</td>
            </tr>
            <tr>
              <td>Nama Mahasiswa</td>
              <td>{{ $item->mhsNama }}</td>
            </tr>
            <tr>
              <td>Judul Tugas Akhir</td>
              <td>{{ $item->jdJudul}}</td>
            </tr>
            <tr>
              <td>Tanggal Sidang</td>
              <td>{{ $item->stTglSid}}</td>
            </tr>
            <tr>
              <td>Jam Sidang</td>
              <td>{{ $item->stWktSid}}</td>
            </tr>
            <tr>
              <td>Ruang Sidang</td>
              <td>{{ $item->ruangNama}}</td>
            </tr>
            <tr>
              <td>Ketua Penguji</td>
              <td>{{ $item->idDosbing1}}</td>
            </tr>
            <tr>
              <td>Sekretaris Penguji</td>
              <td>{{ $item->stPS}}</td>
            </tr>
            <tr>
              <td>Penguji 1</td>
              <td>{{ $item->stP1}}</td>
            </tr>
            <tr>
              <td>Penguji 2</td>
              <td>{{ $item->stP2}}</td>
            </tr>
            <tr>
              <td>Penguji 3</td>
              <td>{{ $item->stP3}}</td>
            </tr>
            <tr>
              <td>Pembimbing Utama</td>
              <td>{{ $item->idDosbing1}}</td>
            </tr>
            <tr>
              <td>Pembimbing Pendamping</td>
              <td>{{ $item->idDosbing2}}</td>
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
