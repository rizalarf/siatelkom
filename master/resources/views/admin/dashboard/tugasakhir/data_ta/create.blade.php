@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Tugas Akhir</li>
    <li class="active">Daftar Judul Tugas Akhir - Create</li>
  </ol>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="uk-alert uk-alert-success data-uk-alert">
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
          <h3 class="box-title">Create</h3>
        </div>
        <div class="box-body">
          <form id="formcreateJudul" class="form-horizontal" role="form" method="POST" action="{{ url('/data-tugas-akhir/store') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="col-md-4 control-label">NIM </label>
            <div class="col-md-6  @if ($errors->has('idMahasiswa')) has-error @endif">
              <select class="form-control input-sm" name="idMahasiswa">
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach ($nim as $item)
                <option value="{{ $item->id }}">{{ $item->mhsNim }}</option>
                @endforeach
              </select>
            </div>
          </div>

         <div class="form-group">
           <label class="col-md-4 control-label">Judul Tugas Akhir</label>
           <div class="col-md-6 @if ($errors->has('jdJudul')) has-error @endif">
             <input type="text" class="form-control" name="jdJudul" value="{{Request::old('jdJudul')}}" placeholder="Enter Judul">
           </div>
         </div>

         <div class="form-group">
           <label class="col-md-4 control-label">Tahun</label>
           <div class="col-md-6 @if ($errors->has('jdTahun')) has-error @endif">
             <input type="text" class="form-control" name="jdTahun" value="{{Request::old('jdTahun')}}" placeholder="Enter Tahun">
           </div>
         </div>

         <div class="form-group">
           <label class="col-md-4 control-label">Pembimbing 1</label>
           <div class="col-md-6 @if ($errors->has('idDosbing1')) has-error @endif">
             <select class="form-control input-sm" name="idDosbing1">
               <option value="">-- Pilih Pembimbing 1 --</option>
               @foreach ($dosbing as $item)
               <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
               @endforeach
             </select>
           </div>
         </div>

         <div class="form-group">
           <label class="col-md-4 control-label">Pembimbing 2</label>
           <div class="col-md-6 @if ($errors->has('idDosbing2')) has-error @endif">
             <select class="form-control input-sm" name="idDosbing2">
               <option value="">-- Pilih Pembimbing 2 --</option>
               @foreach ($dosbing as $item)
               <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
               @endforeach
             </select>
           </div>
         </div>

         <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
             <button type="submit" class="btn btn-primary" id="button-reg">
               Save
             </button>
             <a href="{{{ action('TA\TugasAkhirController@indexJudul') }}}" title="Cancel">
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
