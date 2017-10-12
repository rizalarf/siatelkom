  @extends('admin.login.master')

  @section('content')
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img class="img-md"src="{{URL::asset('admin/dist/img/polines2.png')}}" alt="" />
        <div class="fs-22">Sistem Informasi Akademik<br><b>Teknik Telekomunikasi</b></div>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg"><strong>Masukkan Username dan Password</strong></p>
          @include('common.alert')
        <form class="form-horizontal" role="form" action="{{ route('login') }}" method="post"> {{ csrf_field() }}

          <div class="form-group has-feedback{{ $errors->has('username') ? 'has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
          </div>
        </form>
      </div> <!--/login-box-body-->
    </div><!--/login-box-->
  </body>
  @endsection
