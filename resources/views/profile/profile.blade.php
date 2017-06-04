@extends('layouts.navbar')
@section('content')

<div class="container-fluid" id="profile">

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
  @endif

  <div class="name-profile col-md-2">
    <p><span class="glyphicon glyphicon-user"> {{ Auth::user()->name }}</span></p>
  </div>
  <div class="status-profile col-md-10">
    <p><kbd>{{ Auth::user()->status }}</kbd></p>
  </div>
  <profiletab></profiletab>
  <!-- avatar upload -->
  <div class="container avatar-upload">
    <h4>FOTO</h4>
    <div class="col-md-12 img-upload-view">
      <img src="/images/{{ Auth::user()->avatar }}">
    </div>
    <form action="{{ url('avatar-upload') }}" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <input type="file" class="form-control" name="image" />
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-block">Upload</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
