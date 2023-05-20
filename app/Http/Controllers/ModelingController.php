<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Kriteria;
use App\Models\Modeling;
use Illuminate\Http\Request;

class ModelingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beasiswa = Beasiswa::orderBy('nama', 'asc')->get();

        $kriteria = Kriteria::get();
        $kriteria = $kriteria->unique('nama_kriteria');

        return view('pages.model.index', [
            'title' => 'Data Kriteria',
            'modeling' => Modeling::orderBy('id_model', 'asc')->paginate(6)->withQueryString(),
            'beasiswa' => $beasiswa,
            'kriteria' => $kriteria,
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
            'id_kriteria' => 'required',
            'keterangan' => 'required|max:100',
            'bobot' => 'required|numeric',
        ]);

        Modeling::create($validatedData);

        $notif = notify()->success('Data Model Berhasil Ditambahkan');

        return redirect('/data-model')->with('notif', $notif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modeling  $modeling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::orderBy('nama', 'asc')->get();

        $kriteria = Kriteria::get();
        $kriteria = $kriteria->unique('nama_kriteria');

        return view('pages.model.edit', [
            'title' => 'Edit Data Model',
            'modeling' => Modeling::where('id_model', $id)->first(),
            'beasiswa' => $beasiswa,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modeling  $modeling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_beasiswa' => '',
            'id_kriteria' => '',
            'keterangan' => 'max:100',
            'bobot' => 'numeric',
        ]);

        Modeling::where('id_model', $id)->update($validatedData);

        $notif = notify()->success('Data Model Berhasil Diubah');

        return redirect('/data-model')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modeling  $modeling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modeling::where('id_model', $id)->delete();
        
        $notif = notify()->success('Data Model Berhasil Dihapus');
        
        return redirect('/data-model')->with('notif', $notif);
    }
}
