<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeasiswaController extends Controller
{
    public function index()
    {
        return view ('pages.beasiswa.index', [
            'title' => 'Data Beasiswa',
            'beasiswa' => Beasiswa::orderBy('nama', 'asc')->paginate(6)->withQueryString(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100|unique:beasiswas,nama',
        ]);

        Beasiswa::create($validatedData);

        $notif = notify()->success('Data Beasiswa Berhasil Ditambahkan');

        return redirect('/data-beasiswa')->with('notif', $notif);
    }
    
    public function destroy($id)
    {
        Beasiswa::where('id_beasiswa', $id)->delete();
        
        $notif = notify()->success('Data Beasiswa Berhasil Dihapus');
        
        return redirect('/data-beasiswa')->with('notif', $notif);
    }

    public function edit($id)
    {
        $beasiswa = Beasiswa::where('id_beasiswa', $id)->first();

        return view ('pages.beasiswa.edit', [
            'title' => 'Edit Data Beasiswa',
            'beasiswa' => $beasiswa,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100|unique:beasiswas,nama',
        ]);

        Beasiswa::where('id_beasiswa', $id)->update($validatedData);

        $notif = notify()->success('Data Beasiswa Berhasil Diubah');

        return redirect('/data-beasiswa')->with('notif', $notif);
    }
}
