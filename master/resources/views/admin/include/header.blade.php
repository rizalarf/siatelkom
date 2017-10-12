      <header class="main-header">

        <!-- Logo -->
        <a href="{{URL::to('main')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>TK</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIA TK</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if (Auth::user()->image == "")
                  <img src="{{ asset('admin/dist/img/user-160-nobody.jpg') }}" class="user-image">
                  @else
                  <img src="{{ asset('admin/dist/img/'.auth()->user()->image) }}" class="user-image">
                  @endif
                  <span class="hidden-xs">{{ Auth::user()->name  }} <!-- (level {{Auth::user()->level}}) --></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    @if (Auth::user()->image == "")
                    <img src="{{ asset('admin/dist/img/user-160-nobody.jpg') }}" class="img-circle">
                    @else
                    <img src="{{ asset('admin/dist/img/'.auth()->user()->image) }}" class="img-circle">
                    @endif
                    <p>
                      {{ Auth::user()->name }}<br>
                      {{Auth::user()->level}}
                      <small></small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      @if (Auth::check() && Auth::user()->level == 'Administrator')
                      <a href="#" class="btn btn-default btn-flat" disabled><i class="fa fa-user"></i> Profil</a>
                      @endif
                      @if (Auth::check() && Auth::user()->level == 'Kaprodi')
                      <a href="{{ url('detail-kaprodi') }}" class="btn btn-default btn-flat" disabled><i class="fa fa-user"></i> Profil</a>
                      @endif
                      @if (Auth::check() && Auth::user()->level == 'Dosen')
                      <a href="{{ url('detail-dosen') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                      @endif
                      @if (Auth::check() && Auth::user()->level == 'Mahasiswa')
                      <a href="{{ url('detail-mahasiswa') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                      @endif
                    </div>
                    <div class="pull-right">
                      <a href="{{route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Sign out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display">
                        {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
