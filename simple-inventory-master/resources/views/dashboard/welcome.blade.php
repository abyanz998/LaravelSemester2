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

        <div class="card-header">
          <h2>Fitur Web ini </h2>
        <div class="card-footer text-right">
          <nav class="d-inline-block">
          </nav>
        </div>
      </div>

        <p><h6>Input data Fakultas</h6>
        <p><h6>Input data Jurusan</h6>
          <p><h6>Input data Ruangan</h6>
            <p><h6>Input data Barang</h6>
              <p><h6>Download data Barang</h6>

      </div>
  </div>

</section>
@endsection()
