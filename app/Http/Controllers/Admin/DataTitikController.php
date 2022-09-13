<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\geologi_fisik;
use App\Models\kemiringan_lereng;
use App\Models\hasil_tipologi;
use App\Models\calculasi_tipologi;

class DataTitikController extends Controller
{
    
    public function index()
    {
        $data =  data_titik::all();

        return view('admin.main.data-titik.index', compact('data'));
    }

 
    public function create()
    {
        $string = json_decode(file_get_contents("bbbb.geojson"), true);
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
        $lat_gempa =   -3.8085034;
        $lng_gempa =   102.262839;  
  
        $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
        $dLong = deg2rad($mlng - $lng_gempa); 
    
        $a = sin($dLat/2) * sin($dLat/2) +
                cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $d = $R * $c;
        $hasil = $d = round($d, 2);
        $konversi_meter = $hasil * 1000; 
  
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
            'kecamatan' => null,
            'id_geologi_fisik' => null,
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
        $data = data_titik::findorfail($id);

        return view('admin.main.data-titik.show', compact('data'));
    }


   
    public function destroy($id)
    {
        data_titik::findorfail($id)->delete();
        calculasi_tipologi::where('id_titik',$id)->delete();
        return redirect()->route('data-titik.index')->with(['success' =>  'Data Berhasil dihapus']);
    }

    
}
