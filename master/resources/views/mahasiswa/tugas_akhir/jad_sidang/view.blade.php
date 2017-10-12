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
            <tr>
              <td>NIM</td>
              @foreach ($tugas as $item)
              <td>{{ $item->mhsNim}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Nama Mahasiswa</td>
              @foreach ($tugas as $item)
              <td>{{ $item->mhsNama }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Judul Tugas Akhir</td>
              @foreach ($tugas as $item)
              <td>{{ $item->jdJudul}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Tanggal Sidang</td>
              @foreach ($tugas as $item)
              <td>{{ $item->stTglSid}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Jam Sidang</td>
              @foreach ($tugas as $item)
              <td>{{ $item->stWktSid}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Ruang Sidang</td>
              @foreach ($tugas as $item)
              <td>{{ $item->ruangNama}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Ketua Penguji</td>
              @foreach ($tugas as $item)
              <td>{{ $item->idDosbing1}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Sekretaris Penguji</td>
              @foreach ($tugas as $item)
              <td>{{ $item->stPS}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Penguji 1</td>
              @foreach ($tugas as $item)
              <td>{{ $item->stP1}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Penguji 2</td>
              @foreach ($tugas as $item)
              <td>{{ $item->stP2}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Penguji 3</td>
              @foreach ($tugas as $item)
              <td>{{ $item->stP3}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Pembimbing Utama</td>
              @foreach ($tugas as $item)
              <td>{{ $item->idDosbing1}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Pembimbing Pendamping</td>
              @foreach ($tugas as $item)
              <td>{{ $item->idDosbing2}}</td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</div>

@endsection
