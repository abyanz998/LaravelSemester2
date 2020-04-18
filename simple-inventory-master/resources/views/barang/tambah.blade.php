@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>Ruangan <small>Tambah Data</small></h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}">
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label> Ruangan ID</label>
                <input type="text" name="ruangan_id" class="form-control">
              </div>

              <div class="form-group">
                <label>NAMA BARANG</label>
                <input type="text" name="name_barang" class="form-control">
              </div>

              <div class="form-group">
                <label>TOTAL</label>
                <input type="number" name="total" class="form-control">
              </div>

              <div class="form-group">
                <label>BROKEN</label>
                <input type="number" name="broken" class="form-control">
              </div>

              <div class="form-group">
                <label>CREATED BY</label>
                <input type="text" name="created_by" class="form-control" value="{{Auth::user()->role}}">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>
  </div>

</section>
@endsection()
