@extends('layouts.app')

@section('navbar')

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'FOTOIN') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                  <li class="dropdown menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</span></a>
                      <ul id="login-dropdown" class="dropdown-menu">
                        <li>
                            <div class="row">
                             <div class="container-fluid">
                               <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                   {{ csrf_field() }}

                                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                       <div class="col-md-12">
                                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">

                                           @if ($errors->has('email'))
                                               <span class="help-block">
                                                   <strong>{{ $errors->first('email') }}</strong>
                                               </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                       <div class="col-md-12">
                                           <input id="password" type="password" class="form-control" name="password" required autofocus placeholder="Password">

                                           @if ($errors->has('password'))
                                               <span class="help-block">
                                                   <strong>{{ $errors->first('password') }}</strong>
                                               </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <div class="col-md-12">
                                           <div class="checkbox">
                                               <label>
                                                   <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat saya
                                               </label>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <div class="col-md-12">
                                           <button type="submit" class="btn btn-primary btn-block">
                                               <b>Login</b>
                                           </button>
                                       </div>
                                       <div class="col-md-12">
                                         <a class="btn btn-block" href="{{ route('password.request') }}">
                                             Lupa Password?
                                         </a>
                                       </div>
                                   </div>
                                 </form>
                              </div>
                            </div>
                        </li>
                      </ul>
                  </li>
                  <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
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
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@endsection
