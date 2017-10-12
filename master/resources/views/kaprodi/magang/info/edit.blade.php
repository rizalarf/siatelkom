@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Info Magang</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Magang</li>
      <li><a href="{{{ action('RoleKaprodi\RoleKaprodiController@infomagang') }}}">Info Magang</a></li>
      <li class="active">Edit</li>
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
            <h3 class="box-title">{{$namaMhs}} - Edit</h3>
          </div>
          <div class="box-body">
            <form id="formInfoEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/infomagang/'.$data->id.'/simpanedit') }}"><!--Tampilan form pengisian-->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="{{$data->id}}" >

                <!--<div class="form-group">
                <label class="col-md-4 control-label">ID</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="id" value="{{$data->id}}" disabled="true">
                    <small class="help-block"></small>
                  </div>
                </div>-->
                <!--Untuk menambahkan kolom ID jika ingin ditampilkan (tapi tidak perlu) -->
                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Mahasiswa</label>
                    <div class="col-md-6">
                      <select class="form-control" name="idMahasiswa">
                        <option value="">-- Pilih Mahasiswa --</option>
                          @foreach ($mahasiswa as $item)
                            @if ($item->id == $data->idMahasiswa)
                              <option value="{{$item->id}}" selected>{{$item->mhsNama}}</option>
                            @else
                              <option value="{{$item->id}}" disabled="true">{{$item->mhsNama}}</option>
                            @endif
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Dosen Pembimbing</label>
                    <div class="col-md-6">
                      <select class="form-control" name="idDosen">
                        <option value="">-- Pilih Dosen Pembimbing --</option>
                          @foreach ($dosen as $item)
                            @if ($item->id == $data->idDosen)
                              <option value="{{$item->id}}" selected>{{$item->dosNama}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->dosNama}}</option>
                            @endif
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Perusahaan</label>
                    <div class="col-md-6">
                      <select class="form-control" name="idPerus">
                        <option value="">-- Pilih Perusahaan --</option>
                          @foreach ($perusahaan as $item)
                            @if ($item->id == $data->idPerus)
                              <option value="{{$item->id}}" selected>{{$item->perusNama}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->perusNama}}</option>
                            @endif
                          @endforeach
                      </select>
                      <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nama Pembimbing Lapangan</label>
                    <div class="col-md-6">
                      <select class="form-control" name="idPemb">
                        <option value="">-- Pilih Pembimbing Lapangan --</option>
                          @foreach ($pemblap as $item)
                            @if ($item->id == $data->idPemb)
                              <option value="{{$item->id}}" selected>{{$item->pembNama}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->pembNama}}</option>
                            @endif
                          @endforeach
                      </select>
                      <small class="help-block"></small>
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
                      <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
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
