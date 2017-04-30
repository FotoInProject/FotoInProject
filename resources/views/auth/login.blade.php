@extends('layouts.app')

@section('content')
  <div id="auth" class="container">
      <div class="logo col-md-12">
        <a href="/">F o t o I n </a>
      </div>
      <div class="header col-md-12">
        <h1>Masuk di FotoIn</h1>
      </div>

      <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-12">E-Mail Address</label>

                              <div class="col-md-12">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-12">Password</label>

                              <div class="col-md-12">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat saya
                                </label>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary btn-block">
                                      Login
                                  </button>
                              </div>
                          </div>

                          <div class="have-account col-md-6">
                          <p>Belum punya akun? <a href="/register">Buat akun</a></p>
                          </div>
                          <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
