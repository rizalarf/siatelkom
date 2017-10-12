@extends('admin.layouts.master')

@section('content')
<div id="user">
  <h2>User</h2>

  @include('_partial.flash_message')

  @if (!empty($user_list))
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Level</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($user_list as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->level }}</td>

      </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <p>Tidak ada data user.</p>
   @endif

  <div class="tombol-nav">
    <a href="user/create" class="btn btn-primary">Tambah User</a>
  </div>

</div>
@stop

@section('footer')
@include('admin.layouts.footer')
@stop
