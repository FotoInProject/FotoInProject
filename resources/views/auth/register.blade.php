@extends('layouts.app')

@section('content')
<div id="auth" class="container">
    <div class="logo col-md-12">
      <a href="/">F o t o I n </a>
    </div>
    <div class="header col-md-12">
      <h1>BUAT AKUN DI FOTOIN</h1>
    </div>

    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-12">Nama</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12">E-Mail</label>

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
                                <input id="password" type="password" class="form-control" name="password" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-12">Konfirmasi Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="gender" class="col-md-12">Jenis Kelamin</label>

                            <div class="col-md-12">
                              <select class="form-control" name="gender" required autofocus="">
                                <option value=""></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="col-md-12">Tanggal Lahir</label>

                            <div class="col-md-12">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" required autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="privacy-police">
                          <p>
                            Dengan menekan Buat Akun, Anda mengkonfirmasi telah menyetujui
                            <a href="#">Syarat dan Ketentuan</a> serta <a href="#">Kebijakan Privasi</a>, di Fotoin.
                          </p>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Buat Akun
                                </button>
                            </div>
                        </div>

                        <div class="have-account col-md-12">
                        <p>Sudah punya akun? <a href="/login">Silahkan Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
