<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $fillable = ['Name_Keterangan'];

    public function Mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }
}
