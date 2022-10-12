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
    public function index ()
    {
         $client = new Client();
         $response = $client->request('GET', 'https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.json');
         $status = $response->getStatusCode();
         $body = $response->getBody()->getContents();

         $data = json_decode($body, true);

         $aa =  response()->json($data);
        

        $properties = [];

         foreach ($data['Infogempa']['gempa'] as $item) 
         {
            $properties[] = array
            (
                'tanggal' => $item['Tanggal'], 
                'jam' => $item['Jam'], 
                'coordinates' => $item['Coordinates'], 
                'lat' => $item['Lintang'], 
                'lng' => $item['Bujur'], 
                'magnitude' => $item['Magnitude'], 
                'kedalaman' => $item['Kedalaman'], 
                'wilayah' => $item['Wilayah'], 
                'dirasakan' => $item['Dirasakan'], 
        
            );
        };

    //     dd($properties);

    
      

        //hitung jarak terdekat gempa dengan bengkulu
        $latArea = -3.788892;
        $lngArea = 102.266579;

        for( $i=0; $i<count($properties); $i++ ) 
        {     
                return $i;

                    //metode haversine distance
                    $mlat = $properties[$i]['lat'];
                    $mlng = $properties[$i]['lng'];  
                    $dLat  = deg2rad($mlat - $latArea);  //Rdaerah asal dikurang tujuan
                    $dLong = deg2rad($mlng - $lngArea); //Rdaerah asal dikurang tujuan
                
                    $a = sin($dLat/2) * sin($dLat/2) +
                            cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
                    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
                    $d = $R * $c;
                    $hasil = $d = round($d, 2); //jarak yang didapatkan
                    $konversi_meter = $hasil * 1000; //berfungsi untuk menentukan nilai kemampuan nya konverisi ke meter

                    $arrayName = 
                    array('a' => $hasil, ); 
        }

        

        
    }
}
