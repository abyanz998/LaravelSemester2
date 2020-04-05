<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $search = $request->get('search');
      $data = Fakultas::where('name_fakultas','like', '%'.$search.'%')->paginate(5);
      return view('fakultas.index', ['data' => $data]);

      $data = Fakultas::latest()->paginate(5);
      return view('fakultas.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fakultas::create(['name_fakultas' => $request->name_fakultas]);

        return redirect()->route('fakultas.index');
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
        $data = Fakultas::find($id);

        return view('fakultas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fakultas)
    {
      $request->validate([
          'name_fakultas' => 'required',
      ]);

      $data = Fakultas::find($id_fakultas);
      $data->name_fakultas = $request->input('name_fakultas');
      $data->save();
      return redirect()->route('fakultas.index')->with('Berhasil', 'Data diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id_fakultas)
      {
          Fakultas::whereId_fakultas($id_fakultas)->delete();
          return redirect()->route('fakultas.index')->with('Berhasil', 'Data berhasil di hapus ');

      }

}
