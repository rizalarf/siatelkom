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

<!--main content-->
@section('content')
<div class="content-header">
  <h1>Perusahaan</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Magang</li>
      <li class="active">Data Perusahaan</li>
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
            <h3 class="box-title">Data Perusahaan</h3>
            <a href="{{{ action('Perusahaan\PerusahaanController@tambah') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Perusahaan"><span class="fa fa-plus"></span></a>
          </div>
          <div class="box-body">
            <table id="demo-dt-basic" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nama Perusahaan</th>
                  <th>Alamat</th>
                  <th width=12%>Kontak</th>
                  <th width=15%>Email</th>
                  <th width=10%>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($usaha as $perusitem)
                <tr>
                  <td>{{ $perusitem->perusNama }}</td>
                  <td>{{ $perusitem->perusAlamat }}</td>
                  <td>{{ $perusitem->perusKontak }}</td>
                  <td>{{ $perusitem->perusEmail }}</td>
                  <td>
                    <a href="{{{ URL::to('perusahaan/'.$perusitem->id.'/edit') }}}" class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"  title="Edit"></a>
                    <a href="{{{ action('Perusahaan\PerusahaanController@hapus', [$perusitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus Perusahaan {{{$perusitem->perusNama }}}?')" class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete">
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
