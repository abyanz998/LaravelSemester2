@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>SELAMAT DATANG {{Auth::user()->role}}</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3>{{Auth::user()->name}}</h3>
          <div class="card-footer text-right">
            <nav class="d-inline-block">

            </nav>
          </div>
        </div>
      </div>
  </div>

</section>
@endsection()
