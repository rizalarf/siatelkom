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
    <li class="active">Nilai Dosen Penguji</li>
  </ol>
</div>
<!--main content-->
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
        <div class="box-header with-border">
          <h3 class="box-title">Nilai Dosen Penguji</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/nilai-dosen-penguji/store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <div class="col-md-12  @if ($errors->has('idTugas')) has-error @endif">
                <select class="form-control input-sm" name="idTugas">
                  <option value="">-- Pilih Judul --</option>
                  @foreach ($tugas as $item)
                  <option value="{{ $item->id }}">{{ $item->mhsNama }} - {{ $item->jdJudul }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width=3%>No.</th>
                  <th width=35%>Unsur yang dinilai</th>
                  <th width=15%>Nilai (0 s.d. 100)</th>
                  <th width=15%>Bobot</th>
                  <th>Nilai x Bobot</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Isi dan Bobot Naskah TA</td>
                  <td><input type="text" class="form-control" id="ket1" value="{{Request::old('ujiNilai1')}}" placeholder="0-100"></td>
                  <td><input type="text" class="form-control" value="0.15" disabled></td>
                  <td><input type="text" class="form-control" name="ket1" value="0" readonly=""></td>
                  <script>
                    function total() {
                      var total=0;
                      total+=parseInt($("input[name='ket1']").val());
                      total+=parseInt($("input[name='ket2']").val());
                      total+=parseInt($("input[name='ket3']").val());
                      total+=parseInt($("input[name='ket4']").val());
                      $("#total").val(total);
                    }
                    $("#ket1").on("input", function(){
                      $("input[name='ket1']").val($(this).val()*0.15);
                      total();
                    });
                  </script>
                </tr>
                <tr>
                <td>2.</td>
                  <td>Penguasaan Materi</td>
                  <td><input type="text" class="form-control" id="ket2" value="{{Request::old('ujiNilai2')}}" placeholder="0-100"></td>
                  <td><input type="text" class="form-control" value="0.15" disabled=""></td>
                  <td><input type="text" class="form-control" name="ket2" value="0" readonly=""></td>
                  <script>
                    $("#ket2").on("input", function(){
                      $("input[name='ket2']").val($(this).val()*0.15);
                      total();
                    });
                  </script>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Presentasi dan Penampilan</td>
                  <td><input type="text" class="form-control" id="ket3" value="{{Request::old('ujiNilai3')}}" placeholder="0-100"></td>
                  <td><input type="text" class="form-control" value="0.05" disabled=""></td>
                  <td><input type="text" class="form-control" name="ket3" value="0" readonly=""></td>
                  <script>
                    $("#ket3").on("input", function(){
                      $("input[name='ket3']").val($(this).val()*0.05);
                      total();
                    });
                  </script>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Hasil Rancang Bangun</td>
                  <td><input type="text" class="form-control" id="ket4" value="{{Request::old('ujiNilai4')}}" placeholder="0-100"></td>
                  <td><input type="text" class="form-control" value="0.15" disabled=""></td>
                  <td><input type="text" class="form-control" name="ket4" value="0" readonly=""></td>
                  <script>
                    $("#ket4").on("input", function(){
                      $("input[name='ket4']").val($(this).val()*0.15);
                      total();
                    });
                  </script>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: right">Jumlah</td>
                  <td><input type="text" class="form-control" id="total" name="ketJml" value="0" readonly=""></td>
                </tr>
              </tbody>
            </table>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" id="button-reg">
                  Save
                </button>
                <a href="{{{ action('RoleDsn\RoleDsnController@indexNilUji') }}}" title="Cancel">
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
</section>
<!-- /.content -->
</div>
@endsection
