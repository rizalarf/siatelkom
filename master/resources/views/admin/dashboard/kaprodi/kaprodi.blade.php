@extends('admin.layouts.master')
@push('style')
<link href="{{ url('admin') }}/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="{{ url('admin') }}/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
@endpush
@push('javascript')
<script src="{{ url('admin') }}/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="{{ url('admin') }}/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<!--DataTables Sample [ SAMPLE ]-->
<script src="{{ url('admin') }}/js/demo/tables-datatables.js"></script>
@endpush

<!-- Main content -->
@section('content')
<div class="content-header">
<h1>Kaprodi</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
  <li class="active">Data User</li>
  <li class="active">Data Kaprodi</li>
</ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="uk-alert uk-alert-success" data-uk-alert>
          <a href="" class="uk-alert-close uk-close"></a>
          <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
           @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>Maaf!</strong> Terjadi kesalahan input data.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      </div>
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Data Kaprodi</h3>
          <a href="{{{ action('Kaprodi\KaprodiController@tambah') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Kaprodi"><i class="fa fa-plus"></i></a>
          <a href="{{{ action('Kaprodi\KaprodiController@tanggal') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Kaprodi"><i class="fa fa-plus"></i></a>
        </div>
        <div class="box-body">
          <table id="demo-dt-basic"  class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Tanggal Mulai Menjabat</th>
                <th width=10%>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kapro as $kaproitem)
              <tr>
                <td>{{ $kaproitem->dosNama}}</td>
                <td>{{ $kaproitem->dosNama }}</td>
                <td>{{ $kaproitem->prodiNama }}</td>
                <td>{{ $kaproitem->kapMulai }}</td>
                <td>
                  <a href="{{{ URL::to('kaprodi/'.$kaproitem->id.'/edit') }}}"class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"  title="Edit"></a>
                  <a href="{{{ action('Kaprodi\KaprodiController@hapus', [$kaproitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus Kaprodi {{{'- '.$kaproitem->idDosen }}}?')"class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--"box-body"-->
      </div><!--"box box-primary"-->
    </div><!--"col-xs-12"-->
  </div><!--"row"-->
</section>
<!-- /.content -->
</div>
@endsection
