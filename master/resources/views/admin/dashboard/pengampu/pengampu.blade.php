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
  <h1>Pengampu</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Jadwal</li>
      <li class="active">Data Pengampu</li>
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
            <h3 class="box-title">Data Pengampu</h3>
            <a href="{{{ action('Pengampu\PengampuController@tambah') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Pengampu"><i class="fa fa-plus"></i></a>
          </div>
          <div class="box-body">
            <table id="demo-dt-basic"  class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nama Pengampu</th>
                  <th>Nama Mata Kuliah</th>
                  <th width=10%>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengampu as $pengampuitem)
                <tr>
                  <td>{{ $pengampuitem->dosNama }}</td>
                  <td>{{ $pengampuitem->makulNama }}</td>
                  <td>
                    <a href="{{{ url('pengampu/'.$pengampuitem->id.'/edit') }}}"class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"  title="Edit"></a>
                    <a href="{{{ action('Pengampu\PengampuController@hapus', [$pengampuitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus Pengampu {{{'- '.  $pengampuitem->dosNama.' - '.$pengampuitem->makulNama }}} ?')" class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
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
