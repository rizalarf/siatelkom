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
  <h1>Kurikulum</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Data Kurikulum</li>
      <li class="active">Data Kurikulum</li>
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
            <h3 class="box-title">Data Kurikulum</h3>
            <a href="{{{ action('Kurikulum\KurikulumController@tambah') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Kurikulum"><i class="fa fa-plus"></i></a>
          </div>
          <div class="box-body">
            <table id="demo-dt-basic"  class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Kode Kurikulum</th>
                  <th>Nama Kurikulum</th>
                  <th>Program Studi</th>
                  <th>Tahun</th>
                  <th>SK</th>
                  <th width=10%>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kur as $kurikulumitem)
                <tr>
                  <td>{{ $kurikulumitem->kurKode }}</td>
                  <td>{{ $kurikulumitem->kurNama }}</td>
                  <td>{{ $kurikulumitem->prodiNama }}</td>
                  <td>{{ $kurikulumitem->kurTahun }}</td>
                  <td>{{ $kurikulumitem->kurSk }}</td>
                  <td>
                    <a href="{{{ url('kurikulum/'.$kurikulumitem->id.'/edit') }}}"class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"  title="Edit"></a>
                    <a href="{{{ action('Kurikulum\KurikulumController@hapus', [$kurikulumitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus Kurikulum {{{'- '.$kurikulumitem->kurNama }}} ?')"class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
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
