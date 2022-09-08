<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\struktur_geologi;

class StrukturGeologiController extends Controller
{
    
    public function index()
    {
        $data = struktur_geologi::all();
        return view('admin.main.struktur_geologi.index', compact('data'));
    }

   

   


   
}

