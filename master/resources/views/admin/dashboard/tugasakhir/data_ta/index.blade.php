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

@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="main"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="#">Tugas Akhir</a></li>
    <li class="active">Daftar Judul Tugas Akhir</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="uk-alert uk-alert-success">
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
          <h3 class="box-title">Daftar Judul Tugas Akhir</h3>
          <!-- <a href="{{ url('data-tugas-akhir/create') }}" class="btn btn-success btn-flat btn-sm" title="Tambah Judul"><i class="fa fa-plus"></i></a> -->
        </div>

        <div class="box-body">
          <table id="demo-dt-basic" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Pembimbing 1</th>
                <th>Pembimbing 2</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($judul as $itemjudul)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $itemjudul->mhsNim }}</td>
                <td>{{ $itemjudul->mhsNama }}</td>
                <td>{{ $itemjudul->jdJudul}}</td>
                <td>{{ $itemjudul->jdTahun}}</td>
                <td>{{ $itemjudul->idDosbing1}}</td>
                <td>{{ $itemjudul->idDosbing2}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>

        </div>

      </div>

  </div>

</div>
</section>

@endsection
