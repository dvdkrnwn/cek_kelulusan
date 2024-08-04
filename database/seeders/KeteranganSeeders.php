<?php

namespace Database\Seeders;

use App\Models\Keterangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeteranganSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keterangan_name = ['Tepat Waktu', 'Tidak Tepat Waktu', 'DO'];

        foreach ($keterangan_name as $key => $value) {
            Keterangan::create([
                'Name_Keterangan' => $value,
            ]);
        }
    }
}
