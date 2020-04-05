@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>
      JURUSAN <small>Ganti Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('jurusan.index') }}">
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('jurusan.ganti', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Nama Jurusan Baru</label>
                <input type="text" name="name_jurusan" class="form-control" value="{{ $data->name_jurusan }}">
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
