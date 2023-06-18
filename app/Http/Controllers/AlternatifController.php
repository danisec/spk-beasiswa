<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.alternatif.index', [
            'title' => 'Alternatif',
            'alternatif' => Alternatif::orderBy('nama_alternatif', 'asc')->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alternatif.create', [
            'title' => 'Tambah Alternatif',
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
            'nama_alternatif' => 'required|unique:alternatif,nama_alternatif',
        ], [
            'nama_alternatif.required' => 'Nama Alternatif tidak boleh kosong',
            'nama_alternatif.unique' => 'Nama Alternatif sudah ada',
        ]);

        Alternatif::create($validatedData);

        $notif = notify()->success('Data Alternatif Berhasil Ditambahkan');

        return redirect('/alternatif')->with('notif', $notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.alternatif.show', [
            'title' => 'View Alternatif',
            'alternatif' => Alternatif::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('pages.alternatif.edit', [
            'title' => 'Ubah Alternatif',
            'alternatif' => Alternatif::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_alternatif' => '',
        ]);

        Alternatif::where('id', $id)->update($validatedData);

        $notif = notify()->success('Data Alternatif Berhasil Diubah');

        return redirect('/alternatif')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alternatif::where('id', $id)->delete();
        
        $notif = notify()->success('Data Alternatif Berhasil Dihapus');
        session()->flash('notif', $notif);
        
        return back();
    }
}
