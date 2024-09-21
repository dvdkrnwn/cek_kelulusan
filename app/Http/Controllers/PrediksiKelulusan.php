<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrediksiKelulusan extends Controller
{
    public function PrediksiKelulusanView() {
        return view('pages.prediksi');
    }
}
