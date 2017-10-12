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
    <li class="active">Data Tugas Akhir</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Tugas Akhir</h3>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <td>NIM</td>
              @foreach ($proposal as $item)
              <td>{{ $item->mhsNim}}</td>
              @endforeach
            </tr>
            <tr>
              <td>Nama Mahasiswa</td>
              @foreach ($proposal as $item)
              <td>{{ $item->mhsNama }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Judul Tugas Akhir</td>
              @foreach ($proposal as $item)
              <td>{{ $item->jdJudul }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Tanggal Sidang Proposal</td>
              @foreach ($proposal as $item)
              <td>{{ $item->jdTanggal }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Jam Sidang Proposal</td>
              @foreach ($proposal as $item)
              <td>{{ $item->jdWaktu }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Ruang Sidang Proposal</td>
              @foreach ($proposal as $item)
              <td>{{ $item->ruangNama }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Pembimbing 1</td>
              @foreach ($proposal as $item)
              <td>{{ $item->idDosbing1 }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Pembimbing 2</td>
              @foreach ($proposal as $item)
              <td>{{ $item->idDosbing2 }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Reviewer 1</td>
              @foreach ($proposal as $item)
              <td>{{ $item->idReviewer1 }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Reviewer 2</td>
              @foreach ($proposal as $item)
              <td>{{ $item->idReviewer2 }}</td>
              @endforeach
            </tr>
            <tr>
              <td>Reviewer 3</td>
              @foreach ($proposal as $item)
              <td>{{ $item->idReviewer3 }}</td>
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
