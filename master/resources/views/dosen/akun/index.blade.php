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
    <li class="active">Data Dosen</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Dosen</h3>
      </div>

      <div class="box-body">
        <div class="col-md-3">
          <p align="center">
            @if (Auth::user()->image == "")
            <img src="{{ asset('admin/dist/img/user-160-nobody.jpg') }}" class="img-circle">
            @else
            <img src="{{ asset('admin/dist/img/'.auth()->user()->image) }}" class="img-circle">
            @endif
            @foreach ($user as $item)
            <a class="users-list-name" href="#">{{ $item->dosNama }}</a>
            @endforeach
            <span class="users-list-date">Dosen Tetap</span>
          </p>
        </div>

        <div class="col-md-8">
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td>NIP</td>
                @foreach ($user as $item)
                <td>{{ $item->dosNip}}</td>
                @endforeach
              </tr>
              <tr>
                <td>Nama</td>
                @foreach ($user as $item)
                <td>{{ $item->dosNama }}</td>
                @endforeach
              </tr>
              <tr>
                <td>Alamat Email</td>
                @foreach ($user as $item)
                <td>{{ $item->dosEmail }}</td>
                @endforeach
              </tr>
              <tr>
                <td>Kontak</td>
                @foreach ($user as $item)
                <td>{{ $item->dosKontak }}</td>
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
