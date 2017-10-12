@extends('admin.layouts.master')

@section('content')
<div id="user">
  <h2>Tambah User</h2>

  {!! Form::open(['url' => 'user']) !!}
  @include('user.form', ['submitButtonText' => 'Tambah User'])
  {!! Form::close() !!}
</div>
@stop

@section('footer')
  @include('admin.layouts.footer')
@stop
