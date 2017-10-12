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
  <h1>Pembimbing Lapangan</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data User</li>
      <li class="active">Data Pembimbing Lapangan</li>
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
            <h3 class="box-title">Data Pembimbing Lapangan</h3>
            <a href="{{{ action('PembLap\PembLapController@tambah') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Pembimbing Lapangan"><i class="fa fa-plus"></i></a>
          </div>
          <div class="box-body">
            <table id="demo-dt-basic"  class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Kontak</th>
                  <th>Perusahaan</th>
                  <th width=10%>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($plap as $pemblapitem)
                <tr>
                  <td>{{ $pemblapitem->pembNik }}</td>
                  <td>{{ $pemblapitem->pembNama }}</td>
                  <td>{{ $pemblapitem->pembEmail }}</td>
                  <td>{{ $pemblapitem->pembKontak }}</td>
                  <td>{{ $pemblapitem->perusNama }}</td>
                  <td>
                    <a href="{{{ url('pemblap/'.$pemblapitem->id.'/edit') }}}"class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"  title="Edit"></a>
                    <a href="{{{ action('PembLap\PembLapController@hapus', [$pemblapitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus Pembimbing Lapangan {{{'- '.$pemblapitem->pembNama }}} ?')" class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
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
