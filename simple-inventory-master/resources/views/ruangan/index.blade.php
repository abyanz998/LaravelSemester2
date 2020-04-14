@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>Ruangan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
            <a href="{{ route('ruangan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">Semua Ruangan</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ route('ruang.tambah') }}">
              <button type="button" class="btn btn-primary">Tambah Data Baru</button>
            </a>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $ruangan)
                <tr>
                  <td>{{ $data->firstItem() + $key }}</td>
                  <td>{{ $ruangan->name }}</td>
                  <td>{{ $ruangan->name_jurusan }}</td>
                  <td>
                    <a href="{{ route('ruang.edit', ['id_ruangan' => $ruangan->id]) }}">
                      <button type="button" class="btn btn-sm btn-info">GANTI</button>
                    </a>
                    <!-- id_ruangan itu nama terserah aja sih -->
                   <a href="{{ route('ruang.hapus', ['id_ruangan' => $ruangan->id]) }}"
                    onclick="return confirm('Hapus DATA?');"
                    >
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </a>
                   </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="card-footer text-right">
            <nav class="d-inline-block">

            </nav>
          </div>
        </div>
      </div>
  </div>

</section>
{!! $data->links() !!}
@endsection()
