@extends('admin.layouts.master')
@push('style')
<!--  -->
@endpush
@push('javascript')
<!--  -->
@endpush

@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Nilai Dosen Pembimbing</li>
  </ol>
</div>
<section class="content">

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Nilai Dosen Pembimbing</h3>
      </div>
      <div class="box-body">
        <a href="{{ url('nilai-dosbing/create') }}" class="btn btn-success btn-flat btn-sm"><span class="fa fa-plus"></span> Penilaian</a>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($nilai as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->mhsNim }}</td>
              <td>{{ $item->mhsNama }}</td>
              <td>{{ $item->jdJudul }}</td>
              <td>{{ $item->npJumlah }}</td>
              <td>
                <a href="{{{ action('RoleDsn\RoleDsnController@destroyNilBimb', [$item->id]) }}}" onclick="return confirm('Apakah Anda yakin akan menghapus Nilai {{{'- '.$item->mhsNama }}}?')" class="btn btn-danger btn-icon icon-lg fa fa-trash" title="Delete"></a>
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
