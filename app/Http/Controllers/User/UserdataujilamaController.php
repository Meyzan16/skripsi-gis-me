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
use App\Charts\UserChart;


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

        $dataGempa = data_gempa::where('id_gempa', $request->option_gempa)->first();

        //ambil jumlah data gempa yang sudah dikalkulasi 
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
                        $hasil = $d = round($d, 2); //jarak yang didapatkan dalam bentuk KM
                        $konversi_meter = $hasil * 1000; //berfungsi untuk menentukan nilai kemampuan nya konverisi ke meter
                        //akhir haversine distance

                       
                        //donovan
                        $phytgoras =   pow($dataGempa->kedalaman,2) + pow($hasil,2) ;
                        $hiposenter = sqrt($phytgoras);
                        $Ms = 0.5 * $dataGempa->magnitude;
                        //rumus donovan
                        $alfa = 1080 * EXP($Ms) / pow($hiposenter+25,1.32);

                        $hasil_detik = round($alfa,2); //nilai dalam detik 
                            //karena nilai pga dalam bentuki satuan g(m/s2), maka nilai pga yang dihasilkan
                            //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980 atau di kali 0.0010197162 
                            //dikarenakan besaran umum gravitasi adalah 9.8 m/s2. 
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
                        $nilai_kemampuan_struktur_geologi = '';
                        $ket_struktur_geologi = '';
                        if($konversi_meter > 1000){
                            $nilai_kemampuan_struktur_geologi = 1 ;
                            $ket_struktur_geologi = '4a';
                        }elseif (( $konversi_meter >= 100 ) || ($konversi_meter <= 1000)) {
                            $nilai_kemampuan_struktur_geologi = 2;
                            $ket_struktur_geologi = '4b';
                        }
                        elseif($konversi_meter < 100){
                            $nilai_kemampuan_struktur_geologi = 4 ;
                            $ket_struktur_geologi = '4c';
                        }        
                            
                            //jika gempa sudah dikalkulasi jalankan jalankan script berikut
                            if(count($cek_gempa) > 0  ) 
                            {  
                                //cek  ada titik yang belum dikalkulasi atau sudah ?  jika belum kalkulasi dulu 
                                if(count($cek_gempa) != count($dataTitik))
                                {
                                    $data = data_titik::orderBy('id_titik', 'desc')->limit(1)->first();       
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
                                    $phytgoras =   pow($dataGempa->kedalaman,2) + pow($hasil_1,2) ;
                                    $hiposenter = sqrt($phytgoras);
                                    $Ms = 0.5 * $dataGempa->magnitude;
                                    //rumus donovan
                                    $alfaa = 1080 * EXP($Ms) / pow($hiposenter+25,1.32);

                                    $hasil_detikk = round($alfaa,2);
                                    //karena nilai pga dalam bentuki satuan g(m/s2), maka nilai pga yang dihasilkan
                                    //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980 atau di kali 0.0010197162 
                                    //dikarenakan besaran umum gravitasi adalah 9.8 m/s2. 
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

                                            $nilai_kemampuan_struktur_geologii = '';
                                            $ket_struktur_geologii = '';
                                            if($konversi_meter_1 > 1000){
                                                $nilai_kemampuan_struktur_geologii = 1 ;
                                                $ket_struktur_geologii = '4a';
                                            }elseif (( $konversi_meter_1 >= 100 ) || ($konversi_meter_1 <= 1000)) {
                                                $nilai_kemampuan_struktur_geologii = 2;
                                                $ket_struktur_geologii = '4b';
                                            }
                                            elseif($konversi_meter_1 < 100){
                                                $nilai_kemampuan_struktur_geologii = 4 ;
                                                $ket_struktur_geologii = '4c';
                                            }  


                                            $hasil_kali_bobot_geologi_fisikk = $data->id_geologi_fisik * 3;
                                            $hasil_kali_bobot_lerengg = $data->id_kemiringan_lereng * 3;
                                            $hasil_kali_pgaa = $nilai_kemampuan_pga* 5;
                                            $hasil_kali_bobot_struktur_geologii = $nilai_kemampuan_struktur_geologii * 4;
                                            
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
                                                'id_titik' =>  $data->id_titik,
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
                                                'nilai_kemampuan_struktur_geologi' => $nilai_kemampuan_struktur_geologii ,
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
                                                                ($value->struktur_geologi == $calculai_terakhir->ket_struktur_geologi)&&
                                                                ($value->skor == $calculai_terakhir->skor_akhir))
                                                            {
                                                                calculasi_tipologi::where('id', $calculai_terakhir->id)->update([
                                                                    'id_tipologi' => $value->id,
                                                                    'label_tipologi' => 'Y'
                                                                ]);   

                                                            } 
                                                            
                                                        } 
                                                        //cek jika masih ada id_tipologi yang null
                                                        $cek_id_tipologi_null = calculasi_tipologi::select('*')
                                                        ->orderBy('id', 'desc')
                                                        ->limit(1)
                                                        ->where('id_tipologi', '=' , NULL)
                                                        ->first();
                                                        
                                                        //jika ada titk yang tidak ditemukan semua tipologi lagi makan jalankan kemiripan yang tersedia
                                                            if(!empty($cek_id_tipologi_null)){
                                                                foreach ($tipologiKawasan as $value) 
                                                                {
                                                                    if(
                                                                        ($value->geologi_batuan == $cek_id_tipologi_null->ket_geologi_fisik) &&
                                                                        ($value->kegempaan == $cek_id_tipologi_null->ket_pga) && 
                                                                        ($value->struktur_geologi == $cek_id_tipologi_null->ket_struktur_geologi)

                                                                       )
                                                                    {
                                                                        calculasi_tipologi::where('id', $cek_id_tipologi_null->id)->update([
                                                                             'id_tipologi' => $value->id,
                                                                             'label_tipologi' => 'N'
                                                                        ]); 
                    
                                                                    } 
                                                                    else if(
                                                                        ($value->lereng == $cek_id_tipologi_null->ket_lereng) &&
                                                                        ($value->kegempaan == $cek_id_tipologi_null->ket_pga) && 
                                                                        ($value->struktur_geologi == $cek_id_tipologi_null->ket_struktur_geologi)
                                                                       
                                                                    ){
                                                                        calculasi_tipologi::where('id', $cek_id_tipologi_null->id)->update([
                                                                            'id_tipologi' => $value->id,
                                                                              'label_tipologi' => 'N'
                                                                        ]); 
                    
                                                                    } 
                                                                    else if (($value->geologi_batuan == $cek_id_tipologi_null->ket_geologi_fisik) && 
                                                                            ($value->lereng == $cek_id_tipologi_null->ket_lereng) &&
                                                                            ($value->struktur_geologi == $cek_id_tipologi_null->ket_struktur_geologi))
                                                                    {
                                                                        calculasi_tipologi::where('id', $cek_id_tipologi_null->id)->update([
                                                                            'id_tipologi' => $value->id,
                                                                              'label_tipologi' => 'N'
                                                                        ]);  
                                                                    } 
                    
                                                                    else if (($value->geologi_batuan == $cek_id_tipologi_null->ket_geologi_fisik) && 
                                                                    ($value->lereng == $cek_id_tipologi_null->ket_lereng) &&
                                                                    ($value->kegempaan == $cek_id_tipologi_null->ket_pga) 
                                                                    )
                                                                    {
                                                                        calculasi_tipologi::where('id', $cek_id_tipologi_null->id)->update([
                                                                            'id_tipologi' => $value->id,
                                                                              'label_tipologi' => 'N'
                                                                        ]);  
                                                                    } 

                                                                }
                                                            }

                                                                $calculasi_tipologi = calculasi_tipologi::with(['data_gempa','data_titik.kemiringan_lereng', 'data_titik.geologi_fisik', 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                                                return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi'));
                                }  
                                    //jika semua data titik sudah dikalkulasi makan jalankan script berikut
                                else 
                                {
                                                
                                            
                                                $calculasi_tipologi = calculasi_tipologi::with(['data_gempa','data_titik.kemiringan_lereng', 'data_titik.geologi_fisik', 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                                return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi'));  

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

                                            //insert tabel calculasi_tipologi
                                            calculasi_tipologi::create([
                                                'id_gempa' => $request->option_gempa,
                                                'id_titik' =>  $dataTitik[$i]->id_titik,
                                                'hasil_kali_bobot_geologi_fisik' => $hasil_kali_bobot_geologi_fisik,                                                        
                                                'ket_geologi_fisik' => $ket_geologi_fisik,
                                                'hasil_kali_bobot_lereng' => $hasil_kali_bobot_lereng,
                                                'ket_lereng' => $ket_lereng,
                                                'hasil_pga' => $hasil_pga,
                                                'nilai_kemampuan_pga' => $nilai_kemampuan_pga,
                                                'ket_pga' => $ket_pga,
                                                'hasil_kali_bobot_pga' => $hasil_kali_pga ,
                                                'hasil_jarak_struktur_geologi' =>$hasil,
                                                'nilai_kemampuan_struktur_geologi' => $nilai_kemampuan_struktur_geologi ,
                                                'ket_struktur_geologi' => $ket_struktur_geologi,
                                                'hasil_kali_bobot_struktur_geologi'  => $hasil_kali_bobot_struktur_geologi,   
                                                'skor_akhir' => $skor_akhir,
                                                'kategori' => $kategori
                                            ]);     
                            }                                       
            }

                                    //setelah semua nilai didapatkan maka proses penentuan tipologi
                                    $cek_calculasi_tipologi = calculasi_tipologi::where('id_gempa', $request->option_gempa)->get();
                                    $tipologiKawasan = tipologi_kawasan::all();
                                    $properties = [];
                                        for($m =0; $m<count($cek_calculasi_tipologi); $m++)
                                        {      
                                            foreach ($tipologiKawasan as $value) 
                                            {
                                                if(($value->geologi_batuan == $cek_calculasi_tipologi[$m]->ket_geologi_fisik) && 
                                                    ($value->lereng == $cek_calculasi_tipologi[$m]->ket_lereng) &&
                                                    ($value->kegempaan == $cek_calculasi_tipologi[$m]->ket_pga) && 
                                                    ($value->struktur_geologi == $cek_calculasi_tipologi[$m]->ket_struktur_geologi))
                                                {
                                                    calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                                        'id_tipologi' => $value->id,
                                                        'label_tipologi' => 'Y'
                                                    ]);   
                                                } 
                                            }
                                        }

                                    //cek jika masih ada id_tipologi yang null
                                    $cek_id_tipologi_null = calculasi_tipologi::select('*')
                                                            ->where([
                                                                ['id_gempa', '=', $request->option_gempa],
                                                                ['id_tipologi', '=', NULL]
                                                            ])->get();

                                    if(!empty($cek_id_tipologi_null))
                                    {
                                        for($m =0; $m<count($cek_id_tipologi_null); $m++)
                                            {      
                                                foreach ($tipologiKawasan as $value) 
                                                {
                                                            if(
                                                                ($value->geologi_batuan == $cek_id_tipologi_null[$m]->ket_geologi_fisik) &&
                                                                ($value->kegempaan == $cek_id_tipologi_null[$m]->ket_pga) && 
                                                                ($value->struktur_geologi == $cek_id_tipologi_null[$m]->ket_struktur_geologi)

                                                                )
                                                            {
                                                                calculasi_tipologi::where('id', $cek_id_tipologi_null[$m]->id)->update([
                                                                    'id_tipologi' => $value->id,
                                                                    'label_tipologi' => 'N'
                                                                ]); 
            
                                                            } 
                                                            else if(($value->lereng == $cek_id_tipologi_null[$m]->ket_lereng) &&
                                                            ($value->kegempaan == $cek_id_tipologi_null[$m]->ket_pga) && 
                                                            ($value->struktur_geologi == $cek_id_tipologi_null[$m]->ket_struktur_geologi)
                                                                
                                                            ){
                                                                calculasi_tipologi::where('id', $cek_id_tipologi_null[$m]->id)->update([
                                                                    'id_tipologi' => $value->id,
                                                                    'label_tipologi' => 'N'
                                                                ]); 
            
                                                            } 
                                                            else if (($value->geologi_batuan == $cek_id_tipologi_null[$m]->ket_geologi_fisik) && 
                                                                    ($value->lereng == $cek_id_tipologi_null[$m]->ket_lereng) &&
                                                                    ($value->struktur_geologi == $cek_id_tipologi_null[$m]->ket_struktur_geologi))
                                                            {
                                                                calculasi_tipologi::where('id', $cek_id_tipologi_null[$m]->id)->update([
                                                                    'id_tipologi' => $value->id,
                                                                    'label_tipologi' => 'N'
                                                                ]);  
                                                            } 
            
                                                            else if (($value->geologi_batuan == $cek_id_tipologi_null[$m]->ket_geologi_fisik) && 
                                                            ($value->lereng == $cek_id_tipologi_null[$m]->ket_lereng) &&
                                                            ($value->kegempaan == $cek_id_tipologi_null[$m]->ket_pga) 
                                                            )
                                                            {
                                                                calculasi_tipologi::where('id', $cek_id_tipologi_null[$m]->id)->update([
                                                                    'id_tipologi' => $value->id,
                                                                    'label_tipologi' => 'N'
                                                                ]);  
                                                            } 
                                                }
                                            }
                                    }



                                    $calculasi_tipologi = calculasi_tipologi::with(['data_gempa','data_titik.kemiringan_lereng', 'data_titik.geologi_fisik', 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                    return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi', 'cek_calculasi_tipologi', 'tipologiKawasan', 'properties'));         
        
    }

    

    public function hipotesis_titik(Request $request)
    {
        $data_titik = data_titik::all();
        // $data_gempa = data_gempa::all();
        $data_gempa = data_gempa::orderBy('id_gempa', 'asc')->get();
        // return $dataGempaTerpilih;

      
            

        return view('User.main.hipotesis', compact('data_titik','data_gempa',));
    }







    public function ujihipotesis(Request $request)
    {
        $data_titik = data_titik::all();
        // $data_gempa = data_gempa::all();
        $data_gempa = data_gempa::orderBy('id_gempa', 'asc')->get();

        $dataGempaTerpilih = data_titik::where('id_titik', $request->option_titik)->first();
        // return $dataGempaTerpilih;

        

        $calculasi = DB::table('data_titiks')
        ->select(
            // 'data_titiks.*',
            DB::raw("CAST(calculasi_tipologis.kategori as int) AS kategori_name"),
            // 'calculasi_tipologis.id_gempa'
            )
        ->join('calculasi_tipologis','data_titiks.id_titik','=','calculasi_tipologis.id_titik')
        ->where('data_titiks.id_titik', $request->option_titik)
        ->orderBy('calculasi_tipologis.id_gempa', 'asc')
        ->get();

       


            

        return view('User.main.hasilUji-hipotesis', compact('data_titik','data_gempa' , 'calculasi', 'dataGempaTerpilih'));
    }

   

}
