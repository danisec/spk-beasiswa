<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'alamat',
        'jenis_kelamin',
        'ipk',
        'semester',
        'pendapatan_orangtua',
        'jumlah_saudara',
        'transkrip_nilai',
        'kartu_mahasiswa',
        'slip_gaji',
    ];

    // create algorithm metod Simple Additive Weight
    public function hitungNilaiPrefrensi()
    {
    }
}
