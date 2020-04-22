@extends('layouts.adminmain')

@section('content')
<section class="section">

  <div class="section-header">
    <h1>Upload Foto Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}">
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <body>
          	<div class="row">
          		<div class="container">
          			<h2 class="text-center my-5">Silahkan Pilih Foto Barang yang Akan di Upload</h2>

          			<div class="col-lg-8 mx-auto my-5">

          				@if(count($errors) > 0)
          				<div class="alert alert-danger">
          					@foreach ($errors->all() as $error)
          					{{ $error }} <br/>
          					@endforeach
          				</div>
          				@endif

          				<form action="{{ route('barang.uploadproses') }}" method="POST" enctype="multipart/form-data">
          					{{ csrf_field() }}

          					<div class="form-group">
          						<b>File Gambar</b><br/>
          						<input type="file" name="file">
          					</div>

          					<div class="form-group">
          						<b>Keterangan</b>
          						<textarea class="form-control" name="keterangan"></textarea>
          					</div>

          					<input type="submit" value="Upload" class="btn btn-primary">
          				</form>
          			</div>
          		</div>
          	</div>
          </body>


          <div class="card-footer text-right">
            <nav class="d-inline-block">

            </nav>
          </div>
        </div>
      </div>
  </div>

</section>

@endsection()


<!-- ====================================================================== -->
<!-- <html>
<head>
	<title>Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="row">
		<div class="container">
			<h2 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h2>

			<div class="col-lg-8 mx-auto my-5">

				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

				<form action="/upload/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>

					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>

					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<form action="/upload/proses" method="POST" enctype="multipart/form-data"> -->
