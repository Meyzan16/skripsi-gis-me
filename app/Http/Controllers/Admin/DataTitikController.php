<?php

namespace App\Http\Controllers\Admin;
use App\Models\data_titik;
use Illuminate\Http\Request;

use App\Models\geologi_fisik;
use App\Models\hasil_tipologi;
use App\Models\kemiringan_lereng;
use App\Models\calculasi_tipologi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TestKemiringanController;

class DataTitikController extends Controller
{
    
    public function index()
    {
        $data =  data_titik::all();

        return view('admin.main.data-titik.index', compact('data'));
    }

 
    public function create()
    {
        $string = json_decode(file_get_contents("geologiFisikJsonnn.geojson"), true);
        // return $string;


        $geologiFisik = geologi_fisik::all();
        $kemiringanLereng = kemiringan_lereng::all();
        return view('admin.main.data-titik.create' , compact('geologiFisik', 'kemiringanLereng' , 'string' ));
    }

  
    public function store(Request $request)
    {   
        
        //geologi fisik
        $R = 6371;
        //titik tujuan
        $mlat = $request->latitude;
        $mlng = $request->longitude;  
  
     
        //titik awal di pantai 
        $lat_gempa =   -3.80849266;
        $lng_gempa =   102.2628386;  
  
        $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
        $dLong = deg2rad($mlng - $lng_gempa); 
    
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
        
        // return $a;

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $d = $R * $c;
        $hasil = $d = round($d, 2);
        $konversi_meter = $hasil * 1000; 
  
        //dikali 100 untuk mengubah kedalam bentuk persen
        $hasil_kemiringan = ($request->ketinggian/$konversi_meter) * 100;

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

        data_titik::create([
            'id_geologi_fisik' => $request->id_kemampuan_bebatuan,
            'bebatuan' => $request->batuan,
            'id_kemiringan_lereng' => $value,
            'ketinggian' => $request->ketinggian,
            'jarak' => $konversi_meter ,
            'derajat_kemiringan' => $nilai_akhir_kemiringan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->location,
        ]);

    
        return redirect()->route('data-titik.index')->with('success' , 'Data Berhasil DiTambahkan');
    }

   
    public function show($id)
    {
        $string = json_decode(file_get_contents("geologiFisikJsonnn.geojson"), true);
        $data = data_titik::where('id_titik', $id)->first();

        return view('admin.main.data-titik.show', compact('data', 'string'));
    }


   
    public function destroy($id)
    {
        data_titik::where('id_titik', $id)->delete();
        calculasi_tipologi::where('id_titik',$id)->delete();
        return redirect()->route('data-titik.index')->with(['success' =>  'Data Berhasil dihapus']);
    }

    
}
