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
            "Data Beasiswa" => "data-beasiswa",
            "Kriteria" => "data-kriteria",
            "Model" => "data-model",
        ];

        $daftarBeasiswa = [
            "Daftar Beasiswa" => "daftar-beasiswa",
        ];

        $report = [
            "Laporan" => "Laporan",
        ];

        return view("components.organisms.header", compact("navbar", "inputData","daftarBeasiswa", "report"));
    }
}
