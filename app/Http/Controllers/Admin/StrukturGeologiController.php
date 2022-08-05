<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\data_gempa;
use App\Models\nilai_struktur_geologi;

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
        $dataTitik = data_titik::all(); 
  
        $dataGempa_option = data_gempa::all();

        $dataGempa = data_gempa::where('id', $request->option_gempa)->first();
 
        $informasiGeologi = nilai_struktur_geologi::with(['data_gempa', 'data_titik'])->where('id_gempa', $request->option_gempa)->get();
       

                        $R = 6371; //deg2radius of earth in km | Haversine Distance
                        $lat_gempa =   $dataGempa->latitude;
                        $lng_gempa =   $dataGempa->longitude;
                       
                        
                        for( $i=0; $i<count($dataTitik); $i++ ) {

                            $mlat = $dataTitik[$i]->latitude;
                            $mlng = $dataTitik[$i]->longitude;

                        
                            $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
                            $dLong = deg2rad($mlng - $lng_gempa); //Rdaerah asal dikurang tujuan

                            $a = sin($dLat/2) * sin($dLat/2) +
                                    cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);

                            $c = 2 * atan2(sqrt($a), sqrt(1-$a));
                            $d = $R * $c;

                            $hasil = $d = round($d, 2);

                            $konversi_meter = $hasil * 1000;

                        
                            
                            if($konversi_meter > 1000){
                                $a = 1 ;
                            }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                                $a = 2;
                            }
                            elseif($konversi_meter < 100){
                                $a = 4 ;
                            }

                            nilai_struktur_geologi::create([
                                'id_gempa' => $request->option_gempa,
                                'id_titik' =>   $dataTitik[$i]->id,
                                'jarak' => $hasil,
                                'nilai_kemampuan' =>   $a       
                            ]);
                            

                        //    $distances[] = array (
                        //         'id_gempa' => $request->option_gempa,
                        //         'id_titik' =>   $dataTitik[$i]->id,
                        //         'jarak_dalam_M' => $konversi_meter,
                        //         'jarak' => $hasil,
                        //         'nilai_kemampuan' =>   $a       
                        //     );
                     

                        }

                        //  return $json =  json_encode($distances);
                        

        return view('admin.main.struktur_geologi.kalkulasi_metode.proses_metode', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'informasiGeologi'));
      
        
    }



   
}

