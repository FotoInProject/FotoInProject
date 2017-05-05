@extends('layouts.navbar')
@section('content')

<div class="container-fluid" id="profile">
  <div class="name-profile col-md-2">
    <p><span class="glyphicon glyphicon-user"> {{ Auth::user()->name }}</span></p>
  </div>
  <div class="status-profile col-md-10">
    <p><kbd>{{ Auth::user()->status }}</kbd></p>
  </div>
  <profiletab></profiletab>
  <div class="photo-profile">

  </div>
</div>

@endsection
