@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @if (Auth::check())
                      Hello <strong>{{Auth::user()->name}}</strong> <br>
                      Email Anda : <strong>{{Auth::user()->email}}</strong> <br>
                      Anda login menggunakan username : <strong>{{Auth::user()->username}}</strong>
                  @else
                      Selamat Datang
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
