<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $fillable = ['Keterangan_Id'];

    public function Mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }
}
