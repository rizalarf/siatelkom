@extends('admin.layouts.master')

<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Jadwal Sidang</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Jadwal Sidang</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Jadwal Sidang Tugas Akhir</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Tanggal Sidang</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Ketua Penguji</th>
                <th>Sekretaris Penguji</th>
                <th>Penguji 1</th>
                <th>Penguji 2</th>
                <th>Penguji 3</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
@endsection
