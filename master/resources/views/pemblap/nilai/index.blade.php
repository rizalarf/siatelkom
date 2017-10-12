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
<h1>Nilai Magang</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
  <li class="active">Magang</li>
  <li class="active">Nilai Magang</li>
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
          <h3 class="box-title">Nilai Magang</h3>
          <a href="{{{ action('RolePembLap\RolePembLapController@tambah') }}}" class="btn btn-success btn-flat btn-sm" title="Tambah Nilai"><i class="fa fa-plus"></i></a>
          </div>
        <div class="box-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Mahasiswa</th>
                <th>K1</th>
                <th>K2a</th>
                <th>K2b</th>
                <th>K2c</th>
                <th>K2d</th>
                <th>K3</th>
                <th>K4</th>
                <th>K5a</th>
                <th>K5b</th>
                <th>K5c</th>
                <th>K5d</th>
                <th>K6</th>
                <th>K7</th>
                <th>K8a</th>
                <th>K8b</th>
                <th>K8c</th>
                <th>K8d</th>
                <th>Jumlah</th>
                <th>Rata-rata</th>
                <th>Ket</th>
                <th width=10%>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($nilai as $nilaiitem)
              <tr>
                <td>{{ $nilaiitem->mhsNama }}</td>
                <td>{{ $nilaiitem->kat1 }}</td>
                <td>{{ $nilaiitem->kat2a }}</td>
                <td>{{ $nilaiitem->kat2b }}</td>
                <td>{{ $nilaiitem->kat2c }}</td>
                <td>{{ $nilaiitem->kat2d }}</td>
                <td>{{ $nilaiitem->kat3 }}</td>
                <td>{{ $nilaiitem->kat4 }}</td>
                <td>{{ $nilaiitem->kat5a }}</td>
                <td>{{ $nilaiitem->kat5b }}</td>
                <td>{{ $nilaiitem->kat5c }}</td>
                <td>{{ $nilaiitem->kat5d }}</td>
                <td>{{ $nilaiitem->kat6 }}</td>
                <td>{{ $nilaiitem->kat7 }}</td>
                <td>{{ $nilaiitem->kat8a }}</td>
                <td>{{ $nilaiitem->kat8b }}</td>
                <td>{{ $nilaiitem->kat8c }}</td>
                <td>{{ $nilaiitem->kat8d }}</td>
                <td>{{ $nilaiitem->katJml }}</td>
                <td>{{ $nilaiitem->katRata }}</td>
                <td>{{ $nilaiitem->keterangan }}</td>
                <td>
                <a href="{{{ action('RolePembLap\RolePembLapController@hapusnilai', [$nilaiitem->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus nilai {{{'- '.$nilaiitem->mhsNama }}}?')" class="btn btn-danger btn-icon icon-xs fa fa-trash" title="Delete"></a>
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
