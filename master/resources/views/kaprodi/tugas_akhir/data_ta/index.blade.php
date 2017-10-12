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
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Tugas Akhir</li>
    <li class="active">Data Tugas Akhir</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Tugas Akhir</h3>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <!-- <div class="col-md-3">
            <select class="form-control" name="jdTahun">
              <option value="">-- Pilih Tahun --</option>
              <option value="">2017</option>
            </select>
          </div> -->
        </div>
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
              <th>Dokumen</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($judul as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul }}</td>
              <td>{{ $item->jdTahun }}</td>
              <td>{{ $item->idDosbing1 }}</td>
              <td>{{ $item->idDosbing2 }}</td>
              <td>{{ $item->jdProposal }}</td>
              <td>
                @if ($item->jdStatus == 'ditolak')
                <span class="label label-danger">{{ $item->jdStatus }}</span>
                <!-- <span class="label label-warning">23-08-2017</span> -->
                @elseif ($item->jdStatus == 'diterima')
                <span class="label label-success">{{ $item->jdStatus }}</span>
                @elseif ($item->jdStatus == 'direview')
                <span class="label label-info">{{ $item->jdStatus }}</span>
                @elseif ($item->jdStatus == 'diajukan')
                <span class="label label-warning">{{ $item->jdStatus }}</span>
                @endif
              </td>
              <!-- <td><span class="label label-success">Tanggal</span></td> -->
              <td>
                @if ($item->jdProposal == "")
                <a href="{{ url('#') }}" class="btn btn-danger btn-icon icon-lg fa fa-close disabled"> Dokumen</a>
                @else
                <a href="{{ url('daftar-tugas-akhir/'.$item->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-check"></i> Review</a>
                @endif
                @if ($item->idReviewer1 == "")
                <a href="{{ url('daftar-tugas-akhir/'.$item->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-check"></i> Review</a>
                @else
                <a href="{{ url('daftar-tugas-akhir/'.$item->id.'/view') }}" class="btn btn-success"><i class="fa fa-eye"></i> Detail</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</div>

@endsection
