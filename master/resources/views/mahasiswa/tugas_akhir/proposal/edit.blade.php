@extends('admin.layouts.master')
<!-- Main content -->
@section('content')
<div class="content-header">
  <h1>Tugas Akhir</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('main') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Tugas Akhir</li>
    <li class="active">Judul Tugas Akhir - Edit</li>
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
        <div class="box-header with-border">
          <h3 class="box-title">Edit</h3>
        </div>
        <div class="box-body">
          <form id="formeditJudul" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/proposal/'.$judul->id.'/update') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $judul->id }}">

          <div class="form-group">
            <label class="col-md-4 control-label">Judul Tugas Akhir</label>
            <div class="col-md-6">
              <!-- <input type="text" class="form-control" name="jdJudul" value="{{Request::old('jdJudul')}}" placeholder="Enter Judul"> -->
              <textarea class="form-control" name="jdJudul" rows="4">{{ $judul->jdJudul }}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Tahun</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="jdTahun" value="{{ $judul->jdTahun }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Pembimbing 1 </label>
            <div class="col-md-6">
              <select class="form-control" name="idDosbing1">
                <option value="">-- Pilih Dosen --</option>
                  @foreach ($dosen as $item)
                    @if ($item->id == $judul->idDosbing1)
                      <option value="{{ $item->id }}" selected>{{ $item->dosNama }}</option>
                    @else
                      <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                    @endif
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Pembimbing 2 </label>
            <div class="col-md-6">
              <select class="form-control" name="idDosbing2">
                <option value="">-- Pilih Dosen --</option>
                  @foreach ($dosen as $item)
                    @if ($item->id == $judul->idDosbing2)
                      <option value="{{ $item->id }}" selected>{{ $item->dosNama }}</option>
                    @else
                      <option value="{{ $item->id }}">{{ $item->dosNama }}</option>
                    @endif
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Proposal</label>
            <div class="col-md-6">
              <input accept=".doc, .docx, .pdf" type="file" name="jdProposal" value="{{ $item->jdProposal }}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary" id="button-reg">
                Save
              </button>
              <a href="{{{ action('RoleMhs\RoleMhsController@indexProposal') }}}" title="Cancel">
                <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
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
