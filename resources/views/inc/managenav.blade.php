<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom:10px;">
  <a class="navbar-brand" href="/">Stoogy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/manage/profiles">Manage Profiles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users">Manage Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/manage/events">Manage Events</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="/manage/queries">Messages</a>
      </li> -->
    </ul>
    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#registerModal">Register</a></li>
                        @else
                             <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <li><a href="/profiles">Dashboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    {{-- <li><a href="/posts/create">Create Blog</a></li> --}}
                                </ul>
                            </li>
                        @endif
                    </ul>
  </div>
</nav>

<!-- register modal -->

<div class="modal fade"  id="registerModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="container">
        <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                            </div>
                        </form>
                    </div>
             </div>
        </div>
     </div>
    </div>
</div>