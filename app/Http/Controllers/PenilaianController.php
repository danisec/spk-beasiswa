<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Crips;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        return view('pages.penilaian.index', [
            'title' => 'Penilaian',
            'penilaian' => Penilaian::with('alternatif', 'ipk', 'penghasilan', 'saudara', 'semester', 'tanggungan')
                            ->orderBy('alternatif_id', 'desc')
                            ->paginate(10)
                            ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penilaian.create', [
            'title' => 'Penilaian',
            'alternatif' => Alternatif::orderBy('nama_alternatif', 'asc')->get(),
            'cripsIPK' =>  Crips::with('kriteria')->where('kriteria_id', 2)->orderBy('nama_crips', 'asc')->get(),
            'cripsPOT' =>  Crips::with('kriteria')->where('kriteria_id', 3)->orderBy('nama_crips', 'asc')->get(),
            'cripsSK' => Crips::with('kriteria')->where('kriteria_id', 4)->orderBy('id', 'asc')->get(),
            'cripsSMT' => Crips::with('kriteria')->where('kriteria_id', 5)->orderBy('nama_crips', 'asc')->get(),
            'cripsTO' => Crips::with('kriteria')->where('kriteria_id', 6)->orderBy('id', 'asc')->get(),
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
            'alternatif_id' => 'required|unique:penilaian,alternatif_id',
            'ipk_id' => 'required',
            'penghasilan_id' => 'required',
            'saudara_id' => 'required',
            'semester_id' => 'required',
            'tanggungan_id' => 'required',
        ]);

        Penilaian::create($validatedData);

        $notif = notify()->success('Data Penilaian Berhasil Ditambahkan');

        return redirect('/penilaian')->with('notif', $notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.penilaian.show', [
            'title' => 'View Penilaian',
            'penilaian' => Penilaian::with('alternatif', 'ipk', 'penghasilan', 'saudara', 'semester', 'tanggungan')->where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.penilaian.edit', [
            'title' => 'Ubah Penilaian',
            'alternatif' => Alternatif::orderBy('nama_alternatif', 'asc')->get(),
            'ipk' => Crips::with('kriteria')->where('kriteria_id', 2)->orderBy('nama_crips', 'asc')->get(),
            'penghasilan' => Crips::with('kriteria')->where('kriteria_id', 3)->orderBy('nama_crips', 'asc')->get(),
            'saudara' => Crips::with('kriteria')->where('kriteria_id', 4)->orderBy('id', 'asc')->get(),
            'semester' => Crips::with('kriteria')->where('kriteria_id', 5)->orderBy('nama_crips', 'asc')->get(),
            'tanggungan' =>Crips::with('kriteria')->where('kriteria_id', 6)->orderBy('id', 'asc')->get(),
            'penilaian' => Penilaian::with('alternatif', 'ipk', 'penghasilan', 'saudara', 'semester', 'tanggungan')->where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'alternatif_id' => '',
            'ipk_id' => '',
            'penghasilan_id' => '',
            'saudara_id' => '',
            'semester_id' => '',
            'tanggungan_id' => '',
        ]);

        Penilaian::where('id', $id)->update($validatedData);

        $notif = notify()->success('Data Penilaian Berhasil Diubah');

        return redirect('/penilaian')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penilaian::where('id', $id)->delete();
        
        $notif = notify()->success('Data Penilaian Berhasil Dihapus');
        session()->flash('notif', $notif);
        
        return back();
    }
}
