<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
   
    protected $fillable = ['NIM', 'Name', 'J_Kelamin', 'IPS_1', 'IPS_2', 'IPS_3', 'IPS_4', 'Jalur_Masuk', 'Tahun_Angkatan', 'Keterangan' ];

    public function Keterangan() {
        return $this->belongsTo(Keterangan::class);
    }
}
