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
            <h3 class="box-title">Nilai Magang</h3>
          </div>
          <div class="box-body">
            <form class="form-horizontal" role="form" method="POST" action="">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width=3%>No.</th>
                    <th width=35%>Komponen Nilai</th>
                    <th width=15%>Nilai</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Kemampuan beradaptasi dengan lingkungan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td rowspan="5">2.</td>
                    <td>Keterampilan dalam menjalankan tugas:</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>a.	Kemampuan memahami instruksi</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>b.	Kualitas hasil pekerjaan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>c.	Ketepatan waktu</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>d.	Kemampuan memecahkan masalah</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"  </td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                  <td>3.</td>
                    <td>Tanggung jawab terhadap tugas</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Inisiatif dan kreativitas</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td rowspan="5">5.</td>
                    <td>Komunikasi:</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>a.	Bekerja dalam kelompok (kerjasama)</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>b.	Hubungan dengan atasan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>c.	Hubungan dengan rekan sekerja</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>d.	Hubungan dengan relasi perusahaan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td>Kedisiplinan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>7.</td>
                    <td>Kemandirian</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  <tr>
                    <td rowspan="5">8.</td>
                    <td>Sikap potensial:</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>a.	Sikap menghadapi pekerjaan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>b.	Loyalitas / kesetiaan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>c.	Semangat / motivasi kerja</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td>d.	Penampilan</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center">Total Nilai</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center">Nilai Rata-rata</td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="0-100"></td>
                    <td><input type="text" class="form-control" name="adaptasi" value="" placeholder="Enter Keterangan"></td>
                  <tr>
                </tbody>
              </table>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary" id="button-reg">
                    Save
                  </button>
                  <a href="" title="Cancel">
                    <button type="button" class="btn btn-default" id="button-reg">
                      Cancel
                    </button>
                  </a>
                </div>
              </div>
            </form>
          </div><!--"box-body"-->
        </div><!--"box box-primary"-->
      </div><!--"col-xs-12"-->
    </div><!--"row"-->
  </section><!-- /.content -->
</div>
@endsection
