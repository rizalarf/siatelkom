@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Info Magang</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Magang</li>
      <li><a href="{{{ action('RoleKaprodi\RoleKaprodiController@infomagang') }}}">Info Magang</a></li>
      <li class="active">Tambah Info Magang</li>
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
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Info Magang</h3>
          </div>
          <div class="box-body">
            <form id="formInfoTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/infomagang/tambahinfomagang') }}"><!--Tampilan form pengisian-->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<div class="form-group">
                  <label class="col-md-4 control-label">ID</label>
                    <div class="col-md-6 @if ($errors->has('id')) has-error @endif">
                      <input type="text" class="form-control" name="id" value="{{Request::old('id')}}">
                      <small class="help-block"></small>
                    </div>
                </div>
                -->
                <!--Untuk menambahkan kolom ID jika ingin ditampilkan (tapi tidak perlu) -->
                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Mahasiswa </label>
                    <div class="col-md-6 @if ($errors->has('idMahasiswa')) has-error @endif">
                      <select class="form-control" name="idMahasiswa">
                        <option value="">-- Pilih Mahasiswa --</option>
                          @foreach ($mahasiswa as $item)
                            <option value="{{$item->id}}">{{$item->mhsNama}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Dosen Pembimbing</label>
                    <div class="col-md-6 @if ($errors->has('idDosen')) has-error @endif">
                      <select class="form-control" name="idDosen">
                        <option value="">-- Pilih Dosen Pembimbing--</option>
                          @foreach ($dosen as $item)
                            <option value="{{$item->id}}">{{$item->dosNama}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Perusahaan </label>
                    <div class="col-md-6 @if ($errors->has('idPerus')) has-error @endif">
                      <select class="form-control" name="idPerus">
                        <option value="">-- Pilih Perusahaan --</option>
                          @foreach ($perusahaan as $item)
                            <option value="{{$item->id}}">{{$item->perusNama}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Pembimbing Lapangan </label>
                    <div class="col-md-6 @if ($errors->has('idPemb')) has-error @endif">
                      <select class="form-control" name="idPemb">
                        <option value="">-- Pilih Perusahaan Dahulu --</option>
                      </select>
                    </div>
                </div>
                <script>
                  $("select[name='idPerus']").on('change',function(){
                    $.get("{{ url('pemblap/ajax')}}", {idPerus:$(this).val()}, function(data){
                      var select_pemb = $("select[name='idPemb']");
                        select_pemb.empty();
                        select_pemb.append('<option value="">-- Pilih Pembimbing Lapangan --</option>');
                          $.each(data, function(index, element){
                            select_pemb.append('<option value="'+element.id+'">'+element.pembNama+'</option>');
                          });
                        });
                      });
                </script>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="button-reg">
                        Save
                    </button>
                    <a href="{{{ action('RoleKaprodi\RoleKaprodiController@infomagang') }}}" title="Cancel">
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
