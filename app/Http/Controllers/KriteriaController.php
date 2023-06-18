<?php

namespace App\Http\Controllers;

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
        return view('pages.kriteria.index', [
            'title' => 'Kriteria',
            'kriteria' => Kriteria::orderBy('nama_kriteria', 'asc')->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kriteria.create', [
            'title' => 'Tambah Kriteria',
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
            'nama_kriteria' => 'required|unique:kriteria,nama_kriteria',
            'attribut' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric',
        ], [
            'nama_kriteria.required' => 'Nama Kriteria tidak boleh kosong',
            'nama_kriteria.unique' => 'Nama Kriteria sudah ada',
            'attribut.required' => 'Attribut tidak boleh kosong',
            'attribut.in' => 'Attribut harus diisi dengan Benefit atau Cost',
            'bobot.required' => 'Bobot tidak boleh kosong',
            'bobot.numeric' => 'Bobot harus diisi dengan angka',
        ]);

        Kriteria::create($validatedData);

        $notif = notify()->success('Data Kriteria Berhasil Ditambahkan');

        return redirect('/kriteria')->with('notif', $notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.kriteria.show', [
            'title' => 'View Kriteria',
            'kriteria' => Kriteria::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.kriteria.edit', [
            'title' => 'Ubah Kriteria',
            'attribut' => ['Benefit', 'Cost'],
            'kriteria' => Kriteria::where('id', $id)->first(),
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
            'nama_kriteria' => '',
            'attribut' => 'in:Benefit,Cost',
            'bobot' => 'numeric',
        ], [
            'nama_kriteria.unique' => 'Nama Kriteria sudah ada',
            'attribut.in' => 'Attribut harus diisi dengan Benefit atau Cost',
            'bobot.numeric' => 'Bobot harus diisi dengan angka',
        ]);

        Kriteria::where('id', $id)->update($validatedData);

        $notif = notify()->success('Data Kriteria Berhasil Diubah');

        return redirect('/kriteria')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::where('id', $id)->delete();
        
        $notif = notify()->success('Data Kriteria Berhasil Dihapus');
        session()->flash('notif', $notif);
        
        return back();
    }
}
