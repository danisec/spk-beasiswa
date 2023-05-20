<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Modeling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get keterangan by nama_kriteria in table modeling
        // $keterangan = Modeling::select('keterangan')->

        // dd($keterangan);


        $normalisasiSemester = Mahasiswa::selectRaw('semester / 4 as semester')->get();
        $normalisasiIpk = Mahasiswa::selectRaw('(4.0 - ipk) / (4.0 - 3.5) as ipk')->get();
        $normalisasiPendapatan = Mahasiswa::selectRaw('(3000000 - pendapatan_orangtua) / 3000000 as pendapatan_orangtua')->get();
        $normalisasiSaudara = Mahasiswa::selectRaw('(2 - jumlah_saudara) / 2 as jumlah_saudara')->get();

        // dd($normalisasiSemester);

        // Create algorithm for prefrensial ranking using variable $normalisasiSemester, $normalisasiIpk, $normalisasiPendapatan, $normalisasiSaudara

        // $getPrefrensi = Mahasiswa::selectRaw('
        //     (0.3 * ' . $normalisasiSemester . ')
        // ')->get();

        // dd($getPrefrensi);


        return view('pages.mahasiswa.index', [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => Mahasiswa::orderBy('nama', 'asc')->paginate(10)->withQueryString(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.mahasiswa.create', [
            'title' => 'Create Mahasiswa',
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
            'nim' => 'required|digits:10|numeric|unique:mahasiswas,nim',
            'nama' => 'required|max:100',
            'prodi' => 'required',
            'alamat' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'ipk' => 'required',
            'semester' => 'required',
            'pendapatan_orangtua' => 'required',
            'jumlah_saudara'  => 'required',
            'transkrip_nilai' => 'required|file|mimes:pdf|max:5120',
            'kartu_mahasiswa' => 'required|file|mimes:pdf|max:5120',
            'slip_gaji' => 'required|file|mimes:pdf|max:5120',
        ]);

        $user = Auth::user();

        $validatedData['transkrip_nilai'] = $request->file('transkrip_nilai')->store('files/mahasiswa/' . $user->name);
        $validatedData['kartu_mahasiswa'] = $request->file('kartu_mahasiswa')->store('files/mahasiswa/' . $user->name);
        $validatedData['slip_gaji'] = $request->file('slip_gaji')->store('files/mahasiswa/' . $user->name);

        Mahasiswa::create($validatedData);

        $notif = notify()->success('Data Mahasiswa Berhasil Ditambahkan');

        return redirect('/daftar-beasiswa')->with('notif', $notif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa, $id)
    {
        $mahasiswa = Mahasiswa::where('nim', $id)->first();

        return view ('pages.mahasiswa.edit', [
            'title' => 'Edit Data Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required|digits:10|numeric',
            'nama' => 'required|max:100',
            'prodi' => '',
            'alamat' => 'required|max:100',
            'jenis_kelamin' => '',
            'ipk' => 'required',
            'semester' => 'required',
            'pendapatan_orangtua' => 'required',
            'jumlah_saudara'  => 'required',
            'transkrip_nilai' => 'file|mimes:pdf|max:5120',
            'kartu_mahasiswa' => 'file|mimes:pdf|max:5120',
            'slip_gaji' => 'file|mimes:pdf|max:5120',
        ]);

        $user = Auth::user();

        // Check if file exist storage and delete it
        if ($request->file('transkrip_nilai')) {
            if ($request->oldTranskripNilai) {
            Storage::delete($request->oldTranskripNilai);
            }

            $validatedData['transkrip_nilai'] = $request->file('transkrip_nilai')->store('files/mahasiswa/' . $user->name);
        }

        if($request->file('kartu_mahasiswa')) {
            if ($request->oldKartuMahasiswa) {
            Storage::delete($request->oldKartuMahasiswa);
            }
            
            $validatedData['kartu_mahasiswa'] = $request->file('kartu_mahasiswa')->store('files/mahasiswa/' . $user->name);
        }

        if($request->file('slip_gaji')) {
            if ($request->oldSlipGaji) {
            Storage::delete($request->oldSlipGaji);
            }
            
            $validatedData['slip_gaji'] = $request->file('slip_gaji')->store('files/mahasiswa/' . $user->name);
        }

        Mahasiswa::where('nim', $id)->update($validatedData);

        $notif = notify()->success('Data Mahasiswa Berhasil Diubah');

        return redirect('/daftar-beasiswa')->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete(Mahasiswa::where('nim', $id)->first()->transkrip_nilai);
        Storage::delete(Mahasiswa::where('nim', $id)->first()->kartu_mahasiswa);
        Storage::delete(Mahasiswa::where('nim', $id)->first()->slip_gaji);

        Mahasiswa::where('nim', $id)->delete();
        
        $notif = notify()->success('Data Mahasiswa Berhasil Dihapus');
        
        return redirect('/daftar-beasiswa')->with('notif', $notif);
    }
}
