<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Exports\JurusanExport;
use Maatwebsite\Excel\Facades\Excel;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
        $data = Jurusan::when($request->search, function($query) use($request){
            $query->where('name_jurusan', 'LIKE', '%'.$request->search)
            ->orWhere('name_fakultas', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'id_fakultas', '=', 'jurusan.fakultas_id')->orderBy('id_jurusan', 'asc')->paginate(5); // disini

        return view('jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('jurusan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
            'name_jurusan' => 'required',
            'fakultas_id' => 'required',
        ]);


        $form_data = array(
            'name_jurusan'    =>  $request->name_jurusan,
            'fakultas_id'     =>  $request->fakultas_id,

        );

        Jurusan::create($form_data);

        return redirect()->route('jurusan.index')->with('Berhasil', 'Data Sukses ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = Jurusan::findOrFail($id);

      return view('jurusan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ganti(Request $request, $id)
    {
      $request->validate([
          'name_jurusan' => 'required'

      ]);

      $data = Jurusan::find($id);
      $data->name_jurusan = $request->input('name_jurusan');
      $data->save();
      return redirect()->route('jurusan.index')->with('success', 'Data berhasil di ganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function hapus($id)
     {
         Jurusan::whereId($id)->delete();
         return redirect()->route('jurusan.index')->with('success', 'Data berhasil di hapus ');

     }

     public function export(Request $request){
       return Excel::download(new JurusanExport, 'jurusan-'.date("Y-m-d").'.xlsx');
     }
}
