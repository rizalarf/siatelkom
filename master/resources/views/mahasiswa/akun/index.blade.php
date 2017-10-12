@extends('admin.layouts.master')
@push('style')
<!--  -->
@endpush
@push('javascript')
<!--  -->
@endpush

@section('content')
<div class="content-header">
  <h1>Data User</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Data Mahasiswa</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Mahasiswa</h3>
      </div>

      <div class="box-body">
        <div class="col-md-3">
          <p align="center">
            @if (Auth::user()->image == "")
            <img src="{{ asset('admin/dist/img/user-160-nobody.jpg') }}" class="img-circle">
            @else
            <img src="{{ asset('admin/dist/img/'.auth()->user()->image) }}" class="img-circle">
            @endif
            <!-- @foreach ($user as $item)
            <div class="users-list-name">{{ $item->mhsNama }}</div>
            <span class="users-list-date">{{ $item->mhsNim }}</span>
            @endforeach -->
          </p>
        </div>

        <div class="col-md-8">
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td>NIM</td>
                @foreach ($user as $item)
                <td>{{ $item->mhsNim }}</td>
                @endforeach
              </tr>
              <tr>
                <td>Nama</td>
                @foreach ($user as $item)
                <td>{{ $item->mhsNama }}</td>
                @endforeach
              </tr>
              <tr>
                <td>Alamat Email</td>
                @foreach ($user as $item)
                <td>{{ $item->mhsEmail }}</td>
                @endforeach
              </tr>
              <tr>
                <td>Kontak</td>
                @foreach ($user as $item)
                <td>{{ $item->mhsKontak }}</td>
                @endforeach
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

@endsection
