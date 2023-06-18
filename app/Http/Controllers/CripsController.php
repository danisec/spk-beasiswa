<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.crips.index', [
            'title' => 'Crips',
            'crips' => Crips::with('kriteria')->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.crips.create', [
            'title' => 'Tambah Crips',
            'kriteria' => Kriteria::get(),
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
            'kriteria_id' => 'required',
            'nama_crips' => 'required',
            'bobot' => 'required|numeric',
        ], [
            'kriteria_id.required' => 'Kriteria tidak boleh kosong',
            'nama_crips.required' => 'Nama Crips tidak boleh kosong',
            'bobot.required' => 'Bobot tidak boleh kosong',
            'bobot.numeric' => 'Bobot harus diisi dengan angka',
        ]);

        Crips::create($validatedData);

        $notif = notify()->success('Data Crips Berhasil Ditambahkan');

        return redirect('/crips')->with('notif', $notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.crips.show', [
            'title' => 'View Crips',
            'crips' => Crips::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.crips.edit', [
            'title' => 'Ubah Crips',
            'kriteria' => Kriteria::get(),
            'crips' => Crips::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kriteria_id' => '',
            'nama_crips' => '',
            'bobot' => 'numeric',
        ], [
            'bobot.numeric' => 'Bobot harus diisi dengan angka',
        ]);

        Crips::where('id', $id)->update($validatedData);

        $notif = notify()->success('Data Crips Berhasil Diubah');

        return redirect('/crips')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Crips::where('id', $id)->delete();
        
        $notif = notify()->success('Data Crips Berhasil Dihapus');
        session()->flash('notif', $notif);
        
        return back();
    }
}
