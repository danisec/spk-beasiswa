<?php

namespace App\View\Components\organisms;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $navbar = [
            "Home" => "",
        ];

        $inputData = [
            "Kriteria" => "kriteria",
            "Alternatif" => "alternatif",
            "Crips" => 'crips',
        ];

        $penilaian = [
            "Penilaian" => "penilaian",
        ];

        $daftarBeasiswa = [
            "Daftar Beasiswa" => "daftar-beasiswa",
        ];

        $report = [
            "Laporan" => "perhitungan",
        ];

        return view("components.organisms.header", compact("navbar", "inputData","penilaian","daftarBeasiswa", "report"));
    }
}
