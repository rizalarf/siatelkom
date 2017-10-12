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
<h1>Jadwal Kuliah</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
  <li class="active">Data Kurikulum</li>
  <li class="active">Jadwal</li>
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
          <h3 class="box-title">Jadwal Kuliah</h3>
          <a href="{{{ action('RoleKaprodi\RoleKaprodiController@createJadwal') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Jadwal Kuliah"><i class="fa fa-plus"></i></a>
        </div>
        <div class="box-body">
          <table id="demo-dt-basic"  class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Kelas</th>
                <th>Hari</th>
                <th width=9%>Jam Ke</th>
                <th width=11%>Jam Mulai</th>
                <th width=12%>Jam Selesai</th>
                <th>Mata Kuliah</th>
                <th>Pengampu</th>
                <th width=9%>Ruang</th>
                <th width=10%>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jadwal as $jadwalitem)
              <tr>
                <td>{{ $jadwalitem->klsNama }}</td>
                <td>{{ $jadwalitem->hrNama }}</td>
                <td>{{ $jadwalitem->jmKode }}</td>
                <td>{{ $jadwalitem->jmMulai }}</td>
                <td>{{ $jadwalitem->jmSelesai }}</td>
                <td>{{ $jadwalitem->makulNama }}</td>
                <td>{{ $jadwalitem->dosNama }}</td>
                <td>{{ $jadwalitem->ruangNama }}</td>
                <td>
                  <a href="{{{ URL::to('jadwal-create/'.$jadwalitem->id.'/edit') }}}"class="btn btn-warning btn-icon icon-lg fa fa-pencil-square"  title="Edit"></a>
                  <a href="{{{ action('RoleKaprodi\RoleKaprodiController@destroyJadwal', [$jadwalitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus jadwal {{{'- '.$jadwalitem->makulNama }}}?')"class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
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
