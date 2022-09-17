<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestKemiringanController extends Controller
{
    public function index()
    {
        // $a = (12 / 2260) * 100;

        // return $a;

        return view('Admin.index');
    }
    public function cek(Request $request)
    {

        $ketinggian = $request->ketinggian;
        $jarak = $request->jarak * 1000; 

        $hasil_kemiringan = ($ketinggian/$jarak) * 100;

        $nilai_akhir_kemiringan = round($hasil_kemiringan,3);

        if($nilai_akhir_kemiringan > 0 && $nilai_akhir_kemiringan < 0.07)
        {
           $value = 1;
        }else if($nilai_akhir_kemiringan >= 0.07 && $nilai_akhir_kemiringan < 0.3)
        {
            $value = 2;
        }else if($nilai_akhir_kemiringan >= 0.3 && $nilai_akhir_kemiringan < 1.4)
        {
            $value = 3;
        }else if($nilai_akhir_kemiringan >= 1.4) 
        {
            $value = 4;
        }

        $array = [
            'derajat_kemiringan' => $nilai_akhir_kemiringan,
            'nilai_kemampuan' => $value
        ];
        
        return $array;

    }
}
