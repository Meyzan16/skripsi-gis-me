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

             $stringKedalaman = preg_replace("/[^0-9]/","",$item['Kedalaman']);
             
             $lat = $output_array[1];
             $lng = $output_array2[2];

            $properties[] = array
            (
                'tanggal' => $item['Tanggal'], 
                'jam' => $item['Jam'], 
                'lat' => $lat,
                'lng' => $lng,
                'magnitude' => $item['Magnitude'], 
                'kedalaman' => $stringKedalaman, 
                'wilayah' => $item['Wilayah'], 
                'dirasakan' => $item['Dirasakan']
            );
        };

        return view('User.main.testApi', compact('properties'));
        // return $properties;







        //hitung jarak terdekat gempa dengan bengkulu
        $R = 6371; 
        $latArea = -3.7928; //lat bengkulu
        $lngArea = 102.2608; //lng bengkulu
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

                    if($hasil < 200  )
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
                    }             
        }
        // return $dataArray ;


        $hasilGempaTerbaru = [];


        for ($i=0; $i<count($dataArray); $i++) 
        { 
            $dataTitik = data_titik::all();
                // return count($dataArray);
                $R = 6371; //deg2radius of earth in km | Haversine Distance
                $lat_gempa =   $dataArray[$i]['lat'];
                $lng_gempa =   $dataArray[$i]['lng']; 
                $kedalaman =  $dataArray[$i]['kedalaman'];
                $magnitude =  $dataArray[$i]['magnitude'];

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

                                
                                    //donovan
                                    //formula donovan untuk menentuka pga atau FGA (alfa)
                                    $xx = pow($mlat - $lat_gempa , 2); //latitude
                                    $yy = pow($mlng - $lng_gempa , 2); //longitude
                                    $episenterr = 111* sqrt($xx + $yy);
                                    $hiposenterr = sqrt(pow($episenterr,2) + pow($kedalaman,2));
                                    $Magnitudee = 1.78 * $magnitude - 5.17;
                                    // //rumus donovan
                                    $alfaa = 1080 * EXP(0.5 * $Magnitudee) / pow($hiposenterr+25,1.32);
                                    // //akhir formula donovan  
                                    // //karena nilai pga dalam bentuki satuan g(m/s2), maka nilai pga yang dihasilkan
                                    // //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980
                                    // //dikarenakan besaran umum gravitasi adalah 9.8 m/s2.                           
                                    $hasil_detik = $alfaa;
                                    $konversi_ke_g = $hasil_detik * 0.0010197162; //konversi ke gravitasi

                                    $hasil_konversi = round($konversi_ke_g,5);

                                    // $cek_pgaa = round($konversi_ke_g,2);
                                        if($hasil_konversi < 0.05){
                                            $nilai_kemampuan_pga = 1;
                                            $ket_pgaa = '3a';
                                        }elseif($hasil_konversi >= 0.05 && $hasil_konversi<0.15)
                                        {
                                            $nilai_kemampuan_pga = 2;
                                            $ket_pgaa = '3b';
                                        }elseif($hasil_konversi >= 0.15 && $hasil_konversi<=0.30)
                                        {
                                            $nilai_kemampuan_pga = 3;
                                            $ket_pgaa = '3c';
                                        }elseif($hasil_konversi > 0.30)
                                        {
                                            $nilai_kemampuan_pga = 4;
                                            $ket_pgaa = '3d';
                                        }
                                        


                                //nilai kemampuan struktur geologi
                                $ket_struktur_geologi = '';
                                if($konversi_meter > 1000) {
                                    $nilai_kemampuan_struktur_geologi = 1 ;
                                    $ket_struktur_geologi = '4a';
                                }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                                    $nilai_kemampuan_struktur_geologi  = 2;
                                    $ket_struktur_geologi = '4b';
                                }
                                elseif($konversi_meter < 100){
                                    $nilai_kemampuan_struktur_geologi  = 4 ;
                                    $ket_struktur_geologi = '4c';
                                }  
                                // akhir struktur geologi

                                
                                $ket_geologi_fisik = '';
                                if($dataTitik[$i]->id_geologi_fisik == 1)
                                {
                                    $ket_geologi_fisik = '1a';
                                }elseif($dataTitik[$i]->id_geologi_fisik == 2){
                                    $ket_geologi_fisik = '1b';
                                }elseif($dataTitik[$i]->id_geologi_fisik == 3){
                                    $ket_geologi_fisik = '1c';
                                }elseif($dataTitik[$i]->id_geologi_fisik == 4){
                                    $ket_geologi_fisik = '1d';
                                }
 
                                $ket_lereng = '';
                                if($dataTitik[$i]->id_kemiringan_lereng == 1)
                                {
                                    $ket_lereng = '2a';
                                }elseif($dataTitik[$i]->id_kemiringan_lereng == 2){
                                    $ket_lereng = '2b';
                                }elseif($dataTitik[$i]->id_kemiringan_lereng == 3){
                                    $ket_lereng = '2c';
                                }elseif($dataTitik[$i]->id_kemiringan_lereng == 4){
                                    $ket_lereng = '2d';
                                }

                                $hasil_kali_bobot_geologi_fisik = $dataTitik[$i]->id_geologi_fisik * 3;
                                $hasil_kali_bobot_lereng = $dataTitik[$i]->id_kemiringan_lereng * 3;
                                $hasil_kali_pga = $nilai_kemampuan_pga * 5;
                                $hasil_kali_bobot_struktur_geologi = $nilai_kemampuan_struktur_geologi * 4;
                                
                                $skor_akhir = $hasil_kali_bobot_geologi_fisik + $hasil_kali_bobot_lereng + 
                                              $hasil_kali_pga + $hasil_kali_bobot_struktur_geologi ;
                                
                                if($skor_akhir >= 15 && $skor_akhir<=30)
                                {
                                    $kategori = 'rendah';
                                }elseif($skor_akhir >= 31 && $skor_akhir<=45){
                                    $kategori = 'sedang';
                                }elseif($skor_akhir >= 46 && $skor_akhir<=60){
                                    $kategori = 'tinggi';
                                }
 
                                $hasilGempaTerbaru[$dataArray[$i]['wilayah']] [] = 

                                    array(
                                        
                                            'id_titik' => $dataTitik[$x]->id,
                                            'alamat_titik' => $dataTitik[$x]->alamat,
                                            'bebatuan' => $dataTitik[$x]->bebatuan,
                                            'kemiringan_lereng' => $dataTitik[$x]->id_kemiringan_lereng,
                                            'hasil_pga' => $hasil_detik,
                                            'konversi_ke_gravitasi' => $hasil_konversi,
                                            'nilai_kemampuan_pga' => $nilai_kemampuan_pga,
                                            'ket_pga' => $ket_pgaa,

                                            'nilai_kemampuan_geologi_fisik' => $dataTitik[$i]->id_geologi_fisik,                                                        
                                            'hasil_kali_bobot_geologi_fisik' => $hasil_kali_bobot_geologi_fisik, 
                                            'ket_geologi_fisik' => $ket_geologi_fisik,
    
                                            'nilai_kemampuan_lereng' => $dataTitik[$i]->id_kemiringan_lereng,                                                        
                                            'hasil_kali_bobot_lereng' => $hasil_kali_bobot_lereng,
                                            'ket_lereng' => $ket_lereng,
    
                                            'alamat' => $dataTitik[$x]->alamat,
                                            // 'nilai_kemampuan_pga' => $nilai_kemampuan_pga,
                                            'jarak' => $hasil,
                                            'nilai_kemampuan_struktur_geologi' => $nilai_kemampuan_struktur_geologi, 
                                            'ket_struktur_geologi' => $ket_struktur_geologi,
                                            'hasil_kali_bobot_struktur_geologi'  => $hasil_kali_bobot_struktur_geologi,   
                                            'skor' => $skor_akhir,
                                            'kategori' => $kategori,
                                            'wilayah' => $dataArray[$i]['wilayah'],
                                    );
                    } 

        }            
                
                
                //  return $hasilGempaTerbaru;
                


        return view('User.main.datauji-realtime', compact('dataTitik', 'dataArray', 'hasilGempaTerbaru'));  


        

        
    }
}
