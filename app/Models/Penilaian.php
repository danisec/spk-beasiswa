<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $guarded = ['id'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id', 'id');
    }

    public function ipk()
    {
        return $this->belongsTo(Crips::class, 'ipk_id', 'id');
    }

    public function penghasilan()
    {
        return $this->belongsTo(Crips::class, 'penghasilan_id', 'id');
    }

    public function saudara()
    {
        return $this->belongsTo(Crips::class, 'saudara_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(Crips::class, 'semester_id', 'id');
    }

    public function tanggungan()
    {
        return $this->belongsTo(Crips::class, 'tanggungan_id', 'id');
    }
}
