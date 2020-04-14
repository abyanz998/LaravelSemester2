<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;

class RuanganController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(Request $request)
   {

       $data = Ruangan::when($request->search, function($query) use($request){
           $query->where('name', 'LIKE', '%'.$request->search) // ini yang ditampilin dari model ruangan
           ->orWhere('name_jurusan', 'LIKE', '%'.$request->search.'%'); // ini yang ditampilin dari model jurusan
       })->join('jurusan', 'id_jurusan', '=', 'ruangan.jurusan_id')->orderBy('jurusan_id', 'asc')->paginate(5); // disini dihubungin antar kolom id pemilik yaitu Jurusan sama kolom id penghubung yaitu Ruangan

       return view('ruangan.index', compact('data'));
   }

   public function tambah()
   {
       return view('ruangan.tambah');
   }

   public function store(Request $request)
   {
     $request->validate([
           'name' => 'required',
           'jurusan_id' => 'required',
       ]);


       $form_data = array(
           'name'    =>  $request->name,
           'jurusan_id'     =>  $request->jurusan_id,

       );

       Ruangan::create($form_data);

       return redirect()->route('ruangan.index')->with('Berhasil', 'Data Sukses ditambahkan');
   }

   public function edit($id)
   {
     $data = Ruangan::findOrFail($id);

     return view('ruangan.edit', compact('data'));
   }

   public function ganti(Request $request, $id)
   {
     $request->validate([
         'name' => 'required'

     ]);

     $data = Ruangan::find($id);
     $data->name = $request->input('name');
     $data->save();
     return redirect()->route('ruangan.index')->with('Berhasil', 'Data berhasil di ganti');
   }

   public function hapus($id)
   {
       Ruangan::whereId($id)->delete();
       return redirect()->route('ruangan.index')->with('Behasil', 'Data berhasil di hapus ');

   }
}
