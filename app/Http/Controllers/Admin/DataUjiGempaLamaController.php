<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\data_gempa;
use App\Models\nilai_struktur_geologi;
use App\Models\hasil_tipologi;
use App\Models\tipologi_kawasan;
use Illuminate\Support\Facades\DB;

class DataUjiGempaLamaController extends Controller
{
    


    public function index()
    {
        $dataTitik = data_titik::all();
        $dataGempa = data_gempa::all();

        return view('admin.main.kalkulasi_metode.index', compact('dataTitik', 'dataGempa'));
    }

    public function proses_metode(Request $request)
    {
        $dataTitik = data_titik::all(); 

        $row_hasil_tipologi = hasil_tipologi::all();

        $dataGempa_option = data_gempa::all();

        $dataGempa = data_gempa::where('id', $request->option_gempa)->first();

        $cek_gempa_nilai_struktur_geologi = nilai_struktur_geologi::where('id_gempa', $request->option_gempa)->get();

        $cek_gempa_hasil_tipologi = hasil_tipologi::where('id_gempa', $request->option_gempaa)->get();
        // return $cek_gempa_hasil_tipologi;
        
                $R = 6371; //deg2radius of earth in km | Haversine Distance
                $lat_gempa =   $dataGempa->latitude;
                $lng_gempa =   $dataGempa->longitude;  

                for( $i=0; $i<count($dataTitik); $i++ ) 
                    {
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
                
                            //perkondisian untuk nilai kemampuan tabel nilai_struktur_geologis
                            $a = '';
                            if($konversi_meter > 1000){
                                $a = 1 ;
                            }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                                $a = 2;
                            }
                            elseif($konversi_meter < 100){
                                $a = 4 ;
                            }               
                                    //jika tabel cek_gempa_nilai_struktur_geologi ada isi nya maka jalankan script berikut
                                    if(count($cek_gempa_nilai_struktur_geologi) > 0  ) 
                                    {  
                                        // if (!empty($cek_gempa_nilai_struktur_geologi))
                                        // {              
                                            $informasiGeologi = nilai_struktur_geologi::with(['data_gempa', 'data_titik'])->where('id_gempa', $request->option_gempa)->get();
                                            return view('admin.main.kalkulasi_metode.proses_metode', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'informasiGeologi'));                                                                            
                                        //}                                    
                                                                                 
                                    } else {
                                        if(count($cek_gempa_hasil_tipologi) > 0 )
                                        {
                                                    $b= '';
                                                    if($konversi_meter > 1000){
                                                        $b = '4a' ;
                                                    }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                                                        $b = '4b' ;
                                                    }
                                                    elseif($konversi_meter < 100){
                                                        $b = '4c' ;
                                                    }           
                                                    hasil_tipologi::where('id_titik', $dataTitik[$i]->id)->update([
                                                        'nilai_kemampuan_struktur_geologi' => $b,
                                                        'id_gempa' => $request->option_gempa,
                                                    ]);  
                                                    

                                                    //insert tabel nilai_struktur_geologi
                                                    nilai_struktur_geologi::create([
                                                        'id_gempa' => $request->option_gempa,
                                                        'id_titik' =>  $dataTitik[$i]->id,
                                                        'jarak' =>$hasil,
                                                        'nilai_kemampuan' => $a       
                                                    ]);                                           
                                        }else{
                                                                  
                                            nilai_struktur_geologi::create([
                                                'id_gempa' => $request->option_gempa,
                                                'id_titik' =>  $dataTitik[$i]->id,
                                                'jarak' =>$hasil,
                                                'nilai_kemampuan' => $a       
                                            ]); 

                                            $c= '';
                                            if($konversi_meter > 1000){
                                                $c = '4a' ;
                                            }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                                                $c = '4b' ;
                                            }
                                            elseif($konversi_meter < 100){
                                                $c = '4c' ;
                                            }           

                                            foreach ($row_hasil_tipologi as $valuee) 
                                            {
                                                hasil_tipologi::create([
                                                    'id_titik' => $valuee->id_titik,
                                                    'nilai_geologi_fisik' =>  $valuee->nilai_geologi_fisik,
                                                    'nilai_kemiringan_lereng' => $valuee->nilai_kemiringan_lereng,
                                                    'nilai_kegempaan' => $valuee->nilai_kegempaan, 
                                                    'nilai_kemampuan_struktur_geologi' => $c, 
                                                    'id_gempa' => $request->option_gempa, 
                                                ]); 
                                            }

                                            
                                        }                                       
                                    }                                       
                              
                    }

                     //update id_tipologi nya 
                     for($m =0; $m<count($row_hasil_tipologi); $m++)
                     {       
                         $tipologiKawasan = tipologi_kawasan::all();
                     
                         foreach ($tipologiKawasan as $value) 
                         {
                             if(($value->geologi_batuan == $row_hasil_tipologi[$m]->nilai_geologi_fisik) && 
                                 ($value->lereng == $row_hasil_tipologi[$m]->nilai_kemiringan_lereng) &&
                                 ($value->kegempaan == $row_hasil_tipologi[$m]->nilai_kegempaan) && 
                                 ($value->struktur_geologi == $row_hasil_tipologi[$m]->nilai_kemampuan_struktur_geologi))
                             {
                                 hasil_tipologi::where('id', $row_hasil_tipologi[$m]->id)->update([
                                     'id_tipologi' => $value->id
                                 ]);   
                             }                        
                         } 
                     }
                


                    

                
                    
                    $informasiGeologi = nilai_struktur_geologi::with(['data_gempa', 'data_titik'])->where('id_gempa', $request->option_gempa)->get();
                    return view('admin.main.kalkulasi_metode.proses_metode', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'informasiGeologi'));
               
        
    }

       




   
  

      
                        

      
        


   
}

