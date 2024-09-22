<?php

namespace App\Http\Controllers;

use App\Imports\YourExcelImport;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class PrediksiKelulusan extends Controller
{
    public function PrediksiKelulusanView(Request $request)
    {
        $perPage = 11;
        $mahasiswas = Mahasiswa::orderBy('id', 'desc');

        if ($request->year) {
            $mahasiswas = $mahasiswas->where('Tahun_Angkatan', $request->year);
        } elseif ($request->status) {
            $mahasiswas = $mahasiswas->where('Keterangan', $request->status);
        } elseif ($request->NIM) {
            $mahasiswas = $mahasiswas->where('NIM', $request->NIM);
        }

        $angkatan = Mahasiswa::distinct()->orderBy('Tahun_Angkatan', 'desc')->pluck('Tahun_Angkatan');
        if ($angkatan->count() == 0) {
            $angkatan = [
                Carbon::now()->year,
            ];
        }
        $keterangan = [
            'Tepat Waktu', 'Tidak Tepat Waktu',
        ];

        $mahasiswas = $mahasiswas->paginate($perPage);

        return view('pages.predict.prediksi', compact('mahasiswas', 'angkatan', 'keterangan'));
    }

    public function PrediksiKelulusanAdd()
    {
        return view('pages.predict.prediksi_add');
    }

    public function PrediksiKelulusan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|file',
        ]);

        $file = $request->file('file');
        $data = Excel::toArray(new YourExcelImport, $file);

        $rows = $data[0];

        foreach ($rows as $row) {
            $ips_1 = floatval($row['ips_1']);
            $ips_2 = floatval($row['ips_2']);
            $ips_3 = floatval($row['ips_3']);

            // REQUEST API KE PREDIKSI
            try {
                $res = Http::post('http://127.0.0.1:5555/predict', [
                    'ips_1' => $ips_1,
                    'ips_2' => $ips_2,
                    'ips_3' => $ips_3,
                ]);

                if ($res->successful() && $res['code'] == 201) {
                    Mahasiswa::create([
                        'NIM' => $row['nim'],
                        'Name' => $row['nama'],
                        'J_Kelamin' => $row['jenis_kelamin'],
                        'IPS_1' => $row['ips_1'],
                        'IPS_2' => $row['ips_2'],
                        'IPS_3' => $row['ips_3'],
                        'IPS_4' => 0,
                        'Jalur_Masuk' => $row['jalur_masuk'],
                        'Tahun_Angkatan' => $row['tahun_angkatan'],
                        'Keterangan' => $res['data'],
                    ]);
                } else {
                    Mahasiswa::create([
                        'NIM' => $row['nim'],
                        'Name' => $row['nama'],
                        'J_Kelamin' => $row['jenis_kelamin'],
                        'IPS_1' => $row['ips_1'],
                        'IPS_2' => $row['ips_2'],
                        'IPS_3' => $row['ips_3'],
                        'IPS_4' => 0,
                        'Jalur_Masuk' => $row['jalur_masuk'],
                        'Tahun_Angkatan' => $row['tahun_angkatan'],
                        'Keterangan' => null,
                    ]);
                }
            } catch (\Throwable $th) {
                Mahasiswa::create([
                    'NIM' => $row['nim'],
                    'Name' => $row['nama'],
                    'J_Kelamin' => $row['jenis_kelamin'],
                    'IPS_1' => $row['ips_1'],
                    'IPS_2' => $row['ips_2'],
                    'IPS_3' => $row['ips_3'],
                    'IPS_4' => 0,
                    'Jalur_Masuk' => $row['jalur_masuk'],
                    'Tahun_Angkatan' => $row['tahun_angkatan'],
                    'Keterangan' => null,
                ]);
            }

        }

        return redirect()->route('predict.list');

    }
}
