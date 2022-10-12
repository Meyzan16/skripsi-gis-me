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


class UserdataujilamaController extends Controller
{
    public function index ()
    {
        $dataTitik = data_titik::all();
        $dataGempa = data_gempa::all();

        return view('User.main.datauji-lama', compact('dataTitik', 'dataGempa'));
        
    }

    public function proses_kalkulasi(Request $request)
    {
                $dataTitik = data_titik::all(); 
                $dataGempa_option = data_gempa::all();
                $dataGempa = data_gempa::where('id', $request->option_gempa)->first();

                //sebelum ada nilai di tabel kalkulasi_tipologi
                $cek_gempa = calculasi_tipologi::where('id_gempa', $request->option_gempa)->get();

        
                $R = 6371; //deg2radius of earth in km | Haversine Distance
                $lat_gempa =   $dataGempa->latitude;
                $lng_gempa =   $dataGempa->longitude;  

                for( $i=0; $i<count($dataTitik); $i++ ) 
                    {
                                //metode haversine distance
                                $mlat = $dataTitik[$i]->latitude;
                                $mlng = $dataTitik[$i]->longitude;  
                                $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
                                $dLong = deg2rad($mlng - $lng_gempa); //Rdaerah asal dikurang tujuan
                            
                                $a = sin($dLat/2) * sin($dLat/2) +
                                        cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
                                $c = 2 * atan2(sqrt($a), sqrt(1-$a));
                                $d = $R * $c;
                                $hasil = $d = round($d, 2); //jarak yang didapatkan
                                $konversi_meter = $hasil * 1000; //berfungsi untuk menentukan nilai kemampuan nya konverisi ke meter
                                //akhir haversine distance

                                //formula donovan untuk menentuka pga atau FGA (alfa)
                                $x = pow($mlat - $lat_gempa , 2); //latitude
                                $y = pow($mlng - $lng_gempa , 2); //longitude
                                $episenter = 111* sqrt($x + $y);
                                $hiposenter = sqrt(pow($episenter,2) + pow($dataGempa->kedalaman,2));
                                $Magnitude = 1.78 * $dataGempa->magnitude - 5.17;
                                //rumus donovan
                                $alfa = 1080 * EXP(0.5 * $Magnitude) / pow($hiposenter+25,1.32);
                                //akhir formula donovan  
                                //karena nilai pga dalam bentuki satuan g(m/s2), maka nilai pga yang dihasilkan
                                //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980 atau di kali 0.0010197162 
                                //dikarenakan besaran umum gravitasi adalah 9.8 m/s2.                           

                                $hasil_detik = round($alfa,2);
                                $z = round($alfa,2) * 0.0010197162;
                                $hasil_pga = round($z,2); 
                                //akhir nilai PGA

                                //menentukan nilai kemampuan PGA
                                $cek_pga = round($z,2);

                                if($cek_pga < 0.05){
                                    $nilai_kemampuan_pga = 1;
                                    $ket_pga = '3a';
                                }elseif($cek_pga >= 0.05 && $cek_pga<0.15)
                                {
                                     $nilai_kemampuan_pga = 2;
                                     $ket_pga = '3b';
                                }elseif($cek_pga >= 0.15 && $cek_pga<=0.30)
                                {
                                    $nilai_kemampuan_pga = 3;
                                    $ket_pga = '3c';
                                }elseif($cek_pga > 0.30)
                                {
                                    $nilai_kemampuan_pga = 4;
                                    $ket_pga = '3d';
                                }
                                //akhir menentukan nilai kemampuan pga
                    
                                //perkondisian untuk nilai kemampuan tabel nilai_struktur_geologis
                                $a = '';
                                $ket_struktur_geologi = '';
                                if($konversi_meter > 1000){
                                    $a = 1 ;
                                    $ket_struktur_geologi = '4a';
                                }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                                    $a = 2;
                                    $ket_struktur_geologi = '4b';
                                }
                                elseif($konversi_meter < 100){
                                    $a = 4 ;
                                    $ket_struktur_geologi = '4c';
                                }       
                            
                            
                                    //jika tabel cek_gempa sudah ada isi nya maka jalankan script berikut
                                    if(count($cek_gempa) > 0  ) 
                                    {  
                                        //cek jika ada data baru yang ditambahkan
                                        if(count($cek_gempa) != count($dataTitik))
                                        {
                                            $data = data_titik::orderBy('id', 'desc')->limit(1)->first();
                                                  
                                            //metode haversine distance
                                            $RR = 6371;
                                            $mlat = $data->latitude;
                                            $mlng = $data->longitude;  
                                            $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
                                            $dLong = deg2rad($mlng - $lng_gempa); //Rdaerah asal dikurang tujuan
                                        
                                            $aa = sin($dLat/2) * sin($dLat/2) +
                                                    cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
                                            $cc = 2 * atan2(sqrt($a), sqrt(1-$a));
                                            $dd = $RR * $cc;
                                            $hasil_1 = $d = round($dd, 2);
                                            $konversi_meter_1 = $hasil_1 * 1000;
                                            //akhir metode

                                            //donovan
                                            //formula donovan untuk menentuka pga atau FGA (alfa)
                                            $xx = pow($data->latitude - $lat_gempa , 2); //latitude
                                            $yy = pow($data->longitude - $lng_gempa , 2); //longitude
                                            $episenterr = 111* sqrt($xx + $yy);
                                            $hiposenterr = sqrt(pow($episenterr,2) + pow($dataGempa->kedalaman,2));
                                            $Magnitudee = 1.78 * $dataGempa->magnitude - 5.17;
                                            //rumus donovan
                                            $alfaa = 1080 * EXP(0.5 * $Magnitudee) / pow($hiposenterr+25,1.32);
                                            //akhir formula donovan  
                                            //karena nilai pga dalam bentuki satuan g(m/s2), maka nilai pga yang dihasilkan
                                            //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980
                                            //dikarenakan besaran umum gravitasi adalah 9.8 m/s2.                           

                                            $hasil_detikk = round($alfaa,2);
                                            $konverisi_ke_g = round($alfaa,2) * 0.0010197162;
                                            $hasil_pgaa = round($konverisi_ke_g,2); 
                                            //akhir nilai PGA

                                            //menentukan nilai kemampuan PGA
                                                $cek_pgaa = round($konverisi_ke_g,2);

                                                if($cek_pgaa < 0.05){
                                                    $nilai_kemampuan_pgaa = 1;
                                                    $ket_pgaa = '3a';
                                                }elseif($cek_pgaa >= 0.05 && $cek_pgaa<0.15)
                                                {
                                                    $nilai_kemampuan_pgaa = 2;
                                                    $ket_pgaa = '3b';
                                                }elseif($cek_pgaa >= 0.15 && $cek_pgaa<=0.30)
                                                {
                                                    $nilai_kemampuan_pgaa = 3;
                                                    $ket_pgaa = '3c';
                                                }elseif($cek_pgaa > 0.30)
                                                {
                                                    $nilai_kemampuan_pgaa = 4;
                                                    $ket_pgaa = '3d';
                                                }
                                            //akhir menentukan nilai kemampuan pga

                                            //akhir donovan

                                             
                                    
                                                //perkondisian untuk nilai kemampuan tabel nilai_struktur_geologis
                                                $nilai_kemampuan_struktur_geologi = '';
                                                $ket_struktur_geologii = '';
                                                if($konversi_meter_1 > 1000){
                                                    $nilai_kemampuan_struktur_geologi = 1 ;
                                                    $ket_struktur_geologii = '4a';
                                                }elseif (( $konversi_meter_1 >= 100 ) || ($konversi_meter_1 <= 1000)) {
                                                    $nilai_kemampuan_struktur_geologi = 2;
                                                    $ket_struktur_geologii = '4b';
                                                }
                                                elseif($konversi_meter_1 < 100){
                                                    $nilai_kemampuan_struktur_geologi = 4 ;
                                                    $ket_struktur_geologii = '4c';
                                                }     
                                                
                                            
                                                    $ket_geologi_fisikk = '';
                                                    if($data->id_geologi_fisik == 1)
                                                    {
                                                        $ket_geologi_fisikk= '1a';
                                                    }elseif($data->id_geologi_fisik == 2){
                                                        $ket_geologi_fisikk= '1b';
                                                    }elseif($data->id_geologi_fisik == 3){
                                                        $ket_geologi_fisikk= '1c';
                                                    }elseif($data->id_geologi_fisik == 4){
                                                        $ket_geologi_fisikk= '1d';
                                                    }

                                                    $ket_lerengg = '';
                                                    if($data->id_kemiringan_lereng == 1)
                                                    {
                                                        $ket_lerengg = '2a';
                                                    }elseif($data->id_kemiringan_lereng == 2){
                                                        $ket_lerengg = '2b';
                                                    }elseif($data->id_kemiringan_lereng == 3){
                                                        $ket_lerengg = '2c';
                                                    }elseif($data->id_kemiringan_lereng == 4){
                                                        $ket_lerengg = '2d';
                                                    }


                                                    $hasil_kali_bobot_geologi_fisikk = $data->id_geologi_fisik * 3;
                                                    $hasil_kali_bobot_lerengg = $data->id_kemiringan_lereng * 3;
                                                    $hasil_kali_pgaa = $nilai_kemampuan_pga* 5;
                                                    $hasil_kali_bobot_struktur_geologii = $nilai_kemampuan_struktur_geologi * 4;
                                                    
                                                    $skor_akhirr = $hasil_kali_bobot_geologi_fisikk + $hasil_kali_bobot_lerengg + $hasil_kali_pgaa + $hasil_kali_bobot_struktur_geologii ;
                                                    
                                                    if($skor_akhirr >= 15 && $skor_akhirr <=30)
                                                    {
                                                        $kategorii = 'rendah';
                                                    }elseif($skor_akhirr  >= 31 && $skor_akhirr <=45){
                                                        $kategorii  = 'sedang';
                                                    }elseif($skor_akhirr  >= 46 && $skor_akhirr <=60){
                                                        $kategorii  = 'tinggi';
                                                    }

                                                    //insert tabel calculasi_tipologi
                                                    calculasi_tipologi::create([
                                                        'id_gempa' => $request->option_gempa,
                                                        'id_titik' =>  $data->id,
                                                        'id_geologi_fisik' =>  $data->id_geologi_fisik,
                                                        'hasil_kali_bobot_geologi_fisik' => $hasil_kali_bobot_geologi_fisikk,                                                        
                                                        'ket_geologi_fisik' => $ket_geologi_fisikk,
                                                        'id_lereng' =>  $data->id_kemiringan_lereng,
                                                        'hasil_kali_bobot_lereng' => $hasil_kali_bobot_lerengg,
                                                        'ket_lereng' => $ket_lerengg,
                                                        
                                                        'hasil_detik' => $hasil_detikk,
                                                        'hasil_pga' => $hasil_pgaa,
                                                        'nilai_kemampuan_pga' => $nilai_kemampuan_pgaa,
                                                        'ket_pga' => $ket_pgaa,
                                                        'hasil_kali_bobot_pga' => $hasil_kali_pgaa ,

                                                        'hasil_jarak_struktur_geologi' =>$hasil_1,
                                                        'nilai_kemampuan_struktur_geologi' => $nilai_kemampuan_struktur_geologi ,
                                                        'ket_struktur_geologi' => $ket_struktur_geologii,
                                                        'hasil_kali_bobot_struktur_geologi'  => $hasil_kali_bobot_struktur_geologii,   
                                                        'skor_akhir' => $skor_akhirr,
                                                        'kategori' => $kategorii
                                                    ]); 

                                                            $calculai_terakhir = calculasi_tipologi::orderBy('id', 'desc')->limit(1)->first();
    
                                                            $tipologiKawasan = tipologi_kawasan::all();
                                                        
                                                            foreach ($tipologiKawasan as $value) 
                                                            {
                                                                if(($value->geologi_batuan == $calculai_terakhir->ket_geologi_fisik) && 
                                                                    ($value->lereng == $calculai_terakhir->ket_lereng) &&
                                                                    ($value->kegempaan == $calculai_terakhir->ket_pga) && 
                                                                    ($value->struktur_geologi == $calculai_terakhir->ket_struktur_geologi))
                                                                {
                                                                    calculasi_tipologi::where('id', $calculai_terakhir->id)->update([
                                                                        'id_tipologi' => $value->id
                                                                    ]);   
                                                                }                        
                                                            } 
                                                                                              
                                                            $calculasi_tipologi = calculasi_tipologi::with(['data_gempa','data_titik.kemiringan_lereng', 'data_titik.geologi_fisik', 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                                            return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi'));  

                                        } else 
                                        {
                                            $cek_calculasi_tipologi = calculasi_tipologi::where('id_gempa', $request->option_gempa )->get();  
                                            $properties = [];

                                            $tipologiKawasan = tipologi_kawasan::all();
                                            for( $i=0; $i<count($cek_calculasi_tipologi); $i++ ) 
                                            {      
                                                foreach ($tipologiKawasan as $item ) 
                                                {
                                                            if(
                                                                $cek_calculasi_tipologi[$i]->ket_geologi_fisik == $item['geologi_batuan'] &&
                                                                $cek_calculasi_tipologi[$i]->ket_lereng == $item['lereng'] &&
                                                                $cek_calculasi_tipologi[$i]->ket_pga == $item['kegempaan'] &&
                                                                $cek_calculasi_tipologi[$i]->ket_struktur_geologi == $item['struktur_geologi']  
                                                                )
                                                            {
                                                                $properties[] = array
                                                                (
                                                                    'id' => $cek_calculasi_tipologi[$i]->id_titik,
                                                                    'id_cal' => $item->id,
                                                                    'a' => "validdd", 
                                                                );

                                                            }
                                                            // else {
                                                            //     $properties[] = array
                                                            //     (
                                                                    

                                                            //         'id' => $cek_calculasi_tipologi[$i]->id_titik,
                                                            //         'id_cal' => $item->id,
                                                            //         'a' => "nonvalid", 
                                                            //     );
                                                            // }
                                                }
                                            }
                                            $calculasi_tipologi = calculasi_tipologi::with(['data_gempa','data_titik.kemiringan_lereng', 'data_titik.geologi_fisik', 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                            return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi', 'cek_calculasi_tipologi', 'tipologiKawasan' , 'properties'));  
                                        }                               
                                                                                 
                                    } 
                                    //jika  gempa yang terpilih belum di kalkulasi
                                    else 
                                    {  
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
                                                    $hasil_kali_bobot_struktur_geologi = $a * 4;
                                                    
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

                                                    //insert tabel calculasi_tipologi
                                                    calculasi_tipologi::create([
                                                        'id_gempa' => $request->option_gempa,
                                                        'id_titik' =>  $dataTitik[$i]->id,
                                                        'hasil_kali_bobot_geologi_fisik' => $hasil_kali_bobot_geologi_fisik,                                                        
                                                        'ket_geologi_fisik' => $ket_geologi_fisik,
                                                        'hasil_kali_bobot_lereng' => $hasil_kali_bobot_lereng,
                                                        'ket_lereng' => $ket_lereng,
                                                        'hasil_detik' => $hasil_detik,
                                                        'hasil_pga' => $hasil_pga,
                                                        'nilai_kemampuan_pga' => $nilai_kemampuan_pga,
                                                        'ket_pga' => $ket_pga,
                                                        'hasil_kali_bobot_pga' => $hasil_kali_pga ,
                                                        'hasil_jarak_struktur_geologi' =>$hasil,
                                                        'nilai_kemampuan_struktur_geologi' => $a ,
                                                        'ket_struktur_geologi' => $ket_struktur_geologi,
                                                        'hasil_kali_bobot_struktur_geologi'  => $hasil_kali_bobot_struktur_geologi,   
                                                        'skor_akhir' => $skor_akhir,
                                                        'kategori' => $kategori
                                                    ]);     
                                    }                                       
                    }

                            //setelah semua nilai didapatkan maka proses penentuan tipologi
                            $cek_calculasi_tipologi = calculasi_tipologi::where('id_gempa', $request->option_gempa)->get();
                            
                            for($m =0; $m<count($cek_calculasi_tipologi); $m++)
                                {      
                                    $tipologiKawasan = tipologi_kawasan::all();
                                    foreach ($tipologiKawasan as $value) 
                                    {
                                        if(
                                            ($value->geologi_batuan == $cek_calculasi_tipologi[$m]->ket_geologi_fisik) && 
                                            ($value->lereng == $cek_calculasi_tipologi[$m]->ket_lereng) &&
                                            ($value->kegempaan == $cek_calculasi_tipologi[$m]->ket_pga) && 
                                            ($value->struktur_geologi == $cek_calculasi_tipologi[$m]->ket_struktur_geologi))
                                        {
                                            calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                                'id_tipologi' => $value->id
                                            ]);   
                                        } 
                                        
                                        // else if(
                                        //     ($value->lereng == $cek_calculasi_tipologi[$m]->ket_lereng) &&
                                        //     ($value->kegempaan == $cek_calculasi_tipologi[$m]->ket_pga) && 
                                        //     ($value->struktur_geologi == $cek_calculasi_tipologi[$m]->ket_struktur_geologi))
                                        // {
                                        //     calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                        //         'id_tipologi' => $value->id
                                        //     ]); 

                                        // } 
                                        // else if(
                                        //     ($value->geologi_batuan == $cek_calculasi_tipologi[$m]->ket_geologi_fisik) &&
                                        //     ($value->kegempaan == $cek_calculasi_tipologi[$m]->ket_pga) && 
                                        //     ($value->struktur_geologi == $cek_calculasi_tipologi[$m]->ket_struktur_geologi)
                                        // ){
                                        //     calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                        //         'id_tipologi' => $value->id
                                        //     ]); 

                                        // } 
                                        // else if (($value->geologi_batuan == $cek_calculasi_tipologi[$m]->ket_geologi_fisik) && 
                                        //         ($value->lereng == $cek_calculasi_tipologi[$m]->ket_lereng) &&
                                        //         ($value->struktur_geologi == $cek_calculasi_tipologi[$m]->ket_struktur_geologi))
                                        // {
                                        //     calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                        //         'id_tipologi' => $value->id
                                        //     ]);  
                                        // } 

                                        // else if (($value->geologi_batuan == $cek_calculasi_tipologi[$m]->ket_geologi_fisik) && 
                                        // ($value->lereng == $cek_calculasi_tipologi[$m]->ket_lereng) &&
                                        // ($value->kegempaan == $cek_calculasi_tipologi[$m]->ket_pga) 
                                        // )
                                        // {
                                        //     calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                        //         'id_tipologi' => $value->id
                                        //     ]);  
                                        // } 
                                        
                                    }
                                }
                    
                            
                                $calculasi_tipologi = calculasi_tipologi::with(['data_gempa','data_titik.kemiringan_lereng', 'data_titik.geologi_fisik', 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi', 'cek_calculasi_tipologi', 'tipologiKawasan'));  
                                              
        
    }

}
