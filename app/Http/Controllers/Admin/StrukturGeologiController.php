<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;

class StrukturGeologiController extends Controller
{
    
    public function index()
    {
        return view('admin.main.struktur_geologi.index');
    }

    public function view_geologi()
    {
        $dataTitik = data_titik::all();

        // dd($dataTitik);
        return view('admin.main.struktur_geologi.kalkulasi_metode.index', compact('dataTitik'));
    }

   
}

