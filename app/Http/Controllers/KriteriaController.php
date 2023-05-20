<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beasiswa = Beasiswa::orderBy('nama', 'asc')->get();

        return view('pages.kriteria.index', [
            'title' => 'Data Kriteria',
            'kriteria' => Kriteria::orderBy('id_kriteria', 'asc')->paginate(6)->withQueryString(),
            'beasiswa' => $beasiswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_beasiswa' => 'required',
            'nama_kriteria' => 'required|max:100',
            'sifat' => 'required',
            'syarat' => 'required',
        ]);

        Kriteria::create($validatedData);

        $notif = notify()->success('Data Kriteria Berhasil Ditambahkan');

        return redirect('/data-kriteria')->with('notif', $notif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::orderBy('nama', 'asc')->get();

        return view('pages.kriteria.edit', [
            'title' => 'Edit Data Kriteria',
            'kriteria' => Kriteria::where('id_kriteria', $id)->first(),
            'beasiswa' => $beasiswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_beasiswa' => '',
            'nama_kriteria' => 'max:100',
            'sifat' => '',
            'syarat' => '',
        ]);

        Kriteria::where('id_kriteria', $id)->update($validatedData);

        $notif = notify()->success('Data Kriteria Berhasil Diubah');

        return redirect('/data-kriteria')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::where('id_kriteria', $id)->delete();
        
        $notif = notify()->success('Data Kriteria Berhasil Dihapus');
        
        return redirect('/data-kriteria')->with('notif', $notif);
    }
}
