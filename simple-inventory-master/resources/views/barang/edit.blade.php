@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>
      BARANG <small>Ganti Data</small>
    </h1>
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
            <form action="{{ route('barang.ganti', ['id_barang' => $data->id_barang]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf

              <div class="form-group">
                <label>ID Barang Yang Dirubah</label>
                <input type="text" name="id_barang" class="form-control" value="{{ $data->id_barang }}">
              </div>

              <div class="form-group">
                <label>NAMA BARANG</label>
                <input type="text" name="name_barang" class="form-control" value="{{ $data->name_barang }}">
              </div>

              <div class="form-group">
                <label>TOTAL</label>
                <input type="number" name="total" class="form-control" value="{{ $data->total }}">
              </div>

              <div class="form-group">
                <label>BROKEN</label>
                <input type="number" name="broken" class="form-control" value="{{ $data->broken }}">
              </div>

              <div class="form-group">
                <label>UPDATED BY</label>
                <input type="text" name="updated_by" class="form-control" value="{{Auth::user()->role}}">
              </div>

              @if(count($errors) > 0)
              <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
              </div>
              @endif

                {{ csrf_field() }}

                <div class="form-group">
                  <b>File Gambar Barang</b><br/>
                  <input type="file" name="file" value="{{ url('/file_foto_barang/'.$data->file_foto_barang) }}">
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
