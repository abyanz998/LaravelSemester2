<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Barang;
use\App\Ruangan;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
  public function index(Request $request)
  {
      $data = Barang::when($request->search, function($query) use($request){
          $query->where('name', 'LIKE', '%'.$request->search)
          ->orWhere('name_barang', 'LIKE', '%'.$request->search.'%');
      })->join('ruangan', 'id', '=', 'barang.ruangan_id')->orderBy('id_barang', 'asc')->paginate(5); // disini

      return view('barang.index', compact('data'));
  }

  public function tambah()
  {
      return view('barang.tambah');
  }

  public function store(Request $request)
  {
    // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

    $nama_file = time()."_".$file->getClientOriginalName();

    // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'file_foto_barang';

    // upload file
    $file->move($tujuan_upload,$nama_file);
    $request->validate([
          'ruangan_id' => 'required',
          'name_barang' => 'required',
          'total' => 'required',
          'broken' => 'required',
          'created_by' => 'required',
      ]);


      $form_data = array(
          'ruangan_id'    =>  $request->ruangan_id,
          'name_barang'     =>  $request->name_barang,
          'total'     =>  $request->total,
          'file_foto_barang' => $nama_file,
          'broken'     =>  $request->broken,
          'created_by'     =>  $request->created_by,

      );

      Barang::create($form_data);

      return redirect()->route('barang.index')->with('Berhasil', 'Data Sukses ditambahkan');
  }

  public function edit($id)
  {
    $data = Barang::findOrFail($id);

    return view('barang.edit', compact('data'));
  }

  public function ganti(Request $request, $id)
  {
    $request->validate([
        'id_barang' => 'required',
        'name_barang' => 'required',
        'total' => 'required',
        'broken' => 'required',
        'updated_by' => 'required',
    ]);

    $data = Barang::find($id);
    $data->ruangan_id = $request->input('id_barang');
    $data->name_barang = $request->input('name_barang');
    $data->file_foto_barang = $request->input('file');
    $data->total = $request->input('total');
    $data->broken = $request->input('broken');
    $data->updated_by = $request->input('updated_by');
    $data->save();
    return redirect()->route('barang.index')->with('Berhasil', 'Data berhasil di ganti');
  }


  public function hapus($id)
  {
      Barang::whereId($id)->delete();
      return redirect()->route('barang.index')->with('Behasil', 'Data berhasil di hapus ');

  }

  public function staff(Request $request)
  {
    $data = Barang::when($request->search, function($query) use($request){
        $query->where('name', 'LIKE', '%'.$request->search)
        ->orWhere('name_barang', 'LIKE', '%'.$request->search.'%');
    })->join('ruangan', 'id', '=', 'barang.ruangan_id')->orderBy('id_barang', 'asc')->paginate(5); // disini

      return view('barangStaff.staff', compact('data'));
  }

  public function export(Request $request){
    return Excel::download(new BarangExport, 'barang-'.date("Y-m-d").'.xlsx');
  }

  public function upload(){
    return view('upload.upload');
  }

  public function uploadproses(Request $request){
    $this->validate($request, [
			'file' => 'required',
			'keterangan' => 'required',
		]);

    // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

    // // nama file
		// echo 'File Name: '.$file->getClientOriginalName();
		// echo '<br>';
    //
    //   	        // ekstensi file
		// echo 'File Extension: '.$file->getClientOriginalExtension();
		// echo '<br>';
    //
    //   	        // real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';
    //
    //   	        // ukuran file
		// echo 'File Size: '.$file->getSize();
		// echo '<br>';
    //
    //   	        // tipe mime
		// echo 'File Mime Type: '.$file->getMimeType();


      	        // isi dengan nama folder tempat kemana file diupload yaitu ke public
		$tujuan_upload = 'file_foto_barang';

                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());

    return view('upload.upload');
  }

}
