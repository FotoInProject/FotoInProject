@extends('layouts.navbar')
@section('content')

<div class="container-fluid">
  <h2>Services</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Service</a></li>
    <li><a data-toggle="tab" href="#menu2">Service Provider</a></li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <service></service>
    </div>
    <div id="menu2" class="tab-pane fade">
      <serviceprovider></serviceprovider>
    </div>
  </div>
</div>

@endsection