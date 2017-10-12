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
  <h1>Laporan Akhir</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Magang</li>
      <li class="active">Laporan Akhir</li>
    </ol>
</div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
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
        @if(session()->has('successMessage'))
          <div class="alert alert-success">
            {{ session()->get('successMessage')}}
          </div>
        @endif
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Laporan Akhir</h3>
            <a href="{{{ action('RoleMhs\RoleMhsController@tambahakhir') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Laporan Akhir"><i class="fa fa-plus"></i></a>
          </div>
          <div class="box-body">
            <table id="demo-dt-basic"  class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Mahasiswa</th>
                  <th>Dosen</th>
                  <th>Tanggal</th>
                  <th width=20%>Laporan Akhir</th>
                  <th>Komentar</th>
                  <th width=10%>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($akhir as $akhiritem)
                <tr>
                  <td>{{ $akhiritem->mhsNama }}</td>
                  <td>{{ $akhiritem->dosNama }}</td>
                  <td>{{ $akhiritem->lapakTanggal }}</td>
                  <td><a href="{{ url('admin/contents/lapakhir/document/'.$akhiritem->lapakIsi) }}" title="Download"> {{ $akhiritem->lapakIsi }}</a></td>
                  <td>{{ $akhiritem->lapakKomen }}</td>
                  <td>
                    <a href="{{{ url('lapakhirmhs/'.$akhiritem->id.'/edit') }}}"class="btn btn-warning btn-icon icon-lg fa fa-pencil"  title="Edit"></a>
                    <a href="{{{ action('RoleMhs\RoleMhsController@hapusakhir', [$akhiritem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus laporan tanggal {{{$akhiritem->lapakTanggal}}} ?')"class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!--"box-body"-->
        </div><!--"box box-primary"-->
      </div><!--"col-xs-12"-->
    </div><!--"row"-->
  </section><!-- /.content -->
</div>
@endsection
