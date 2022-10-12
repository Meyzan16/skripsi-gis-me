<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\data_gempa;
use App\Models\calculasi_tipologi;
use App\Models\hasil_tipologi;
use App\Models\tipologi_kawasan;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class UjiDataRealtimeController extends Controller
{
    public function index (Request $request)
    {
         $client = new Client();
         $response = $client->request('GET', 'https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.json');
         $status = $response->getStatusCode();
         $body = $response->getBody()->getContents();
         $data = json_decode($body, true);
        //  $aa =  response()->json($data);
         $properties = [];
         foreach ($data['Infogempa']['gempa'] as $item) 
         {
             preg_match('/(.*),(.*)/', $item['Coordinates'], $output_array);
             preg_match('/(.*),(.*)/', $item['Coordinates'], $output_array2);
             $lat = $output_array[1];
             $lng = $output_array2[2];

            $properties[] = array
            (
                'tanggal' => $item['Tanggal'], 
                'jam' => $item['Jam'], 
                'lat' => $lat,
                'lng' => $lng,
                'magnitude' => $item['Magnitude'], 
                'kedalaman' => $item['Kedalaman'], 
                'wilayah' => $item['Wilayah'], 
                'dirasakan' => $item['Dirasakan']
            );
        };

        // return $properties;

        //hitung jarak terdekat gempa dengan bengkulu
        $R = 6371; 
        $latArea = -3.7928;
        $lngArea = 102.2608;
        for( $i=0; $i<count($properties); $i++ ) 
        {     
                    //metode haversine distance
                    $mlat = $properties[$i]['lat'];
                    $mlng = $properties[$i]['lng'];  
                    $dLat  = deg2rad($mlat - $latArea);  //Rdaerah asal dikurang tujuan
                    $dLong = deg2rad($mlng - $lngArea); //Rdaerah asal dikurang tujuan
                
                    $a = sin($dLat/2) * sin($dLat/2) +
                            cos(deg2rad($latArea)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
                    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
                    $d = $R * $c;
                    $hasil = $d = round($d, 2); //jarak yang didapatkan satuan KM
                    // $konversi_meter = $hasil * 1000; //berfungsi untuk menentukan nilai kemampuan nya konverisi ke meter

                    // $cekJarak="";
                   
                
                    if($hasil < 600 )
                    {
                        $dataArray[] = array(
                            'tanggal' => $properties[$i]['tanggal'], 
                            'jam' => $properties[$i]['jam'], 
                            'lat' => $properties[$i]['lat'],
                            'lng' => $properties[$i]['lng'],
                            'magnitude' => $properties[$i]['magnitude'], 
                            'kedalaman' => $properties[$i]['kedalaman'], 
                            'dirasakan' => $properties[$i]['dirasakan'],
                            'wilayah' => $properties[$i]['wilayah'],
                            'hasil' => $hasil,
                            'cek' => 'data ditemukan'  
                        );
                    } else {
                        $dataArray[] = array('cek' => 'tidak ada data');
                    }                   
                    // dataArray[] = array(
                    //     'tanggal' => $properties[$i]['tanggal'], 
                    //     'jam' => $properties[$i]['jam'], 
                    //     'lat' => $properties[$i]['lat'],
                    //     'lng' => $properties[$i]['lng'],
                    //     'magnitude' => $properties[$i]['magnitude'], 
                    //     'kedalaman' => $properties[$i]['kedalaman'], 
                    //     'dirasakan' => $properties[$i]['dirasakan'],
                    //     'wilayah' => $properties[$i]['wilayah'],
                    //     'hasil' => $hasil,
                    //     'cek' => 'data ditemukan'  
                    // );
        }

        //cek data ditemukan
        // return $dataArray;
        //proses perhitungan setelah di dapatkan data gempa terbaru
        $dataTitik = data_titik::all();

        for ($i=0; $i<count($dataArray) ; $i++) 
        { 
            

            if($dataArray[$i]['cek'] == 'data ditemukan')
            {
                $R = 6371; //deg2radius of earth in km | Haversine Distance
                $lat_gempa =   $dataArray[$i]['lat'];
                $lng_gempa =   $dataArray[$i]['lng']; 

                //haversine distance
                for( $x=0; $x<count($dataTitik); $x++ ) 
                    {
                                $mlat = $dataTitik[$x]->latitude;
                                $mlng = $dataTitik[$x]->longitude;  
                                $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
                                $dLong = deg2rad($mlng - $lng_gempa); //Rdaerah asal dikurang tujuan
                            
                                $a = sin($dLat/2) * sin($dLat/2) +
                                        cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
                                $c = 2 * atan2(sqrt($a), sqrt(1-$a));
                                $d = $R * $c;
                                $hasil = $d = round($d, 2); //jarak yang didapatkan
                                $konversi_meter = $hasil * 1000;

                                $hasilGempaTerbaru[$dataArray[$i]['wilayah']][] = 
                                    array(
                                        'id_titik' => $dataTitik[$x]->id,
                                        'wilayah' => $dataArray[$i]['wilayah'],
                                        'jarak' => $hasil
                                    );
                    }
                            
                            return $hasilGempaTerbaru;
                            //akhir haversine
                            
            }
                        
                        
        }
                                     
        return view('User.main.datauji-realtime', compact('dataArray'));  


        

        
    }
}
