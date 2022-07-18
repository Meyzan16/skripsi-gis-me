<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\data_gempa;

class StrukturGeologiController extends Controller
{
    
    public function index()
    {
        return view('admin.main.struktur_geologi.index');
    }

    public function view_geologi()
    {
        $dataTitik = data_titik::all();
        $dataGempa = data_gempa::all();

        return view('admin.main.struktur_geologi.kalkulasi_metode.index', compact('dataTitik', 'dataGempa'));
    }

    public function proses_metode(Request $request)
    {
        $ambilOption = $request->option_gempa;

        // return view('admin.main.struktur_geologi.kalkulasi_metode.index', compact('dataTitik', 'data_gempa'));
        // dd($ambilOption);
        
    }



   
}

