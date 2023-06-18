<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Perhitungan;
use Illuminate\Http\Request;


class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::orderBy('id', 'asc')->get();
        $penilaian = Penilaian::with('alternatif', 'ipk', 'penghasilan', 'saudara', 'semester', 'tanggungan')->get();

        $perhitungan = Penilaian::with('alternatif', 'ipk', 'penghasilan', 'saudara', 'semester', 'tanggungan')
                            ->orderBy('alternatif_id', 'desc')
                            ->paginate(10)
                            ->withQueryString();
        
        $C1 = [];
        $C2 = [];
        $C3 = [];
        $C4 = [];
        $C5 = [];

        // Menampilkan semua data crips bobot pada tabel penilaian berdasarkan nama alternatif
        foreach ($penilaian as $key => $value) {
            $C1[] = $value->ipk->bobot;
            $C2[] = $value->penghasilan->bobot;
            $C3[] = $value->saudara->bobot;
            $C4[] = $value->semester->bobot;
            $C5[] = $value->tanggungan->bobot;
        }

        // Mencari minMax dari C1, C2, C3, C4, C5
        $minMax = [];
        $minMax['C1'] = [
            'min' => min($C1),
            'max' => max($C1),
        ];
        $minMax['C2'] = [
            'min' => min($C2),
            'max' => max($C2),
        ];
        $minMax['C3'] = [
            'min' => min($C3),
            'max' => max($C3),
        ];
        $minMax['C4'] = [
            'min' => min($C4),
            'max' => max($C4),
        ];
        $minMax['C5'] = [
            'min' => min($C5),
            'max' => max($C5),
        ];

        // Mencari nilai normalisasi dari C1, C2, C3, C4, C5
        $normalisasi = [];
        foreach ($penilaian as $key => $value) {
            $alternatifNama = $value->alternatif->nama_alternatif;

            $normalisasi[$key]['alternatif'] = $alternatifNama;
            $normalisasi[$key]['C1'] = $value->ipk->bobot / $minMax['C1']['max'];
            $normalisasi[$key]['C2'] = $value->penghasilan->bobot / $minMax['C2']['min'];
            $normalisasi[$key]['C3'] = $value->saudara->bobot / $minMax['C3']['max'];
            $normalisasi[$key]['C4'] = $value->semester->bobot / $minMax['C4']['max'];
            $normalisasi[$key]['C5'] = $value->tanggungan->bobot / $minMax['C5']['max'];
        }

        $normalisasi = collect($normalisasi);

        // Hitung nilai perangkingan untuk setiap alternatif berdasarkan bobot kriteria
        $rankings = [];
        foreach ($penilaian as $key => $value) {
            $rankings[$key]['alternatif'] = $value->alternatif->nama_alternatif;
            $rankings[$key]['nilai'] = ($normalisasi[$key]['C1'] * $kriteria[0]->bobot) + ($normalisasi[$key]['C2'] * $kriteria[1]->bobot) + ($normalisasi[$key]['C3'] * $kriteria[2]->bobot) + ($normalisasi[$key]['C4'] * $kriteria[3]->bobot) + ($normalisasi[$key]['C5'] * $kriteria[4]->bobot);
        }

        usort($rankings, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        foreach ($rankings as $key => &$ranking) {
            $ranking['rank'] = $key + 1;
        }

        $hasil = collect($rankings);

        return view('pages.laporan.index', [
            'title' => 'Laporan',
            'perhitungan' => $perhitungan,
            'normalisasi' => $normalisasi->sortBy('alternatif')->values()->all(),
            'hasil' => $hasil,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }
}
