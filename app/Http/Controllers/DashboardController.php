<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard(Request $request)
    {
        $tahun = Mahasiswa::distinct()->orderBy('Tahun_Angkatan', 'desc')->pluck('Tahun_Angkatan');
        if ($request->year) {
            $query = Mahasiswa::where('Tahun_Angkatan', $request->year);
            $total_mahasiswa = $query->get()->count();
            $tahun_data = $request->year;
            $ontime = $query->where('Keterangan', 'Tepat Waktu')->get()->count();
            $late_time = $total_mahasiswa - $ontime;

            $perempuan = $query->where('J_Kelamin', 'P')->get()->count();
            $p_ontime = $query->where('J_Kelamin', 'P')->where('Keterangan', 'Tepat Waktu')->get()->count();
            $p_late_time = $perempuan - $p_ontime;

            $laki = $total_mahasiswa - $perempuan;
            $l_ontime = Mahasiswa::where('Tahun_Angkatan', $request->year)->where('J_Kelamin', 'L')->where('Keterangan', 'Tepat Waktu')->get()->count();
            $l_late_time = $laki - $l_ontime;

        } else {
            $query = Mahasiswa::where('Tahun_Angkatan', $tahun[0]);
            $total_mahasiswa = $query->get()->count();
            $tahun_data = $tahun[0];
            $ontime = $query->where('Keterangan', 'Tepat Waktu')->get()->count();
            $late_time = $total_mahasiswa - $ontime;

            $perempuan = $query->where('J_Kelamin', 'P')->get()->count();
            $p_ontime = $query->where('J_Kelamin', 'P')->where('Keterangan', 'Tepat Waktu')->get()->count();
            $p_late_time = $perempuan - $p_ontime;

            $laki = $total_mahasiswa - $perempuan;
            $l_ontime = Mahasiswa::where('Tahun_Angkatan', $tahun[0])->where('J_Kelamin', 'L')->where('Keterangan', 'Tepat Waktu')->get()->count();
            $l_late_time = $laki - $l_ontime;
        }

        return view('pages.beranda', compact('tahun', 'total_mahasiswa', 'tahun_data', 'ontime', 'late_time', 'p_ontime', 'p_late_time', 'l_ontime', 'l_late_time'));
    }
}
