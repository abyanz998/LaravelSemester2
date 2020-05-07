@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>Inventaris Barang</h1>
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
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">Semua Barang</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ route('barang.tambah') }}">
              <button type="button" class="btn btn-primary">Tambah Barang Baru</button>
            </a>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
              <a href="{{ route('barang.download') }}">
                <button type="button" class="btn btn-sm btn-info">EXPORT EXCELL</button>
              </a>
              <a href="{{ route('barang.upload') }}">
                <button type="button" class="btn btn-sm btn-info">UPLOAD IMAGE</button>
              </a>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Total</th>
                  <th scope="col">FOTO BARANG</th>
                  <th scope="col">Broken</th>
                  <th scope="col">Created_by</th>
                  <th scope="col">Updated_by</th>
                    <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $barang)
                <tr>
                  <td>{{ $data->firstItem() + $key }}</td>
                  <td>{{ $barang->name_barang }}</td>
                  <td>{{ $barang->name }}</td>
                  <td>{{ $barang->total }}</td>
                  <td><img width="150px" src="{{ url('/file_foto_barang/'.$barang->file_foto_barang) }}"></td>
                  <td>{{ $barang->broken }}</td>
                  <td>{{ $barang->created_by }}</td>
                  <td>{{ $barang->updated_by }}</td>
                  <td>
                    <a href="{{ route('barang.edit', ['id_barang' => $barang->id_barang]) }}">
                      <button type="button" class="btn btn-sm btn-info">GANTI</button>
                    </a>
                    <!-- id_ruangan itu nama terserah aja sih -->
                   <a href="{{ route('barang.hapus', ['id_barang' => $barang->id_barang]) }}"
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
