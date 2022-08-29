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
                            $hasil = $d = round($d, 2);
                            $konversi_meter = $hasil * 1000; //berfungsi untuk menentukan nilai kemampuan nya
                            //akhir haversine distance
                            

                            //formula donovan untuk menentuka pga atau FGA (alfa)
                            //belum mengaitkan dengan kedalaman nyaa
                            $x = pow($dataTitik[$i]->latitude + $lat_gempa,2) * 111; //lat
                            $y = pow($dataTitik[$i]->longitude - $lng_gempa,2) * 111; //lng
                            $r1 = round($x,2);
                            $r2 = round($y,2);
                            $r1r2 = round(sqrt($r1+$r2),3); //nilai hiposenter
                            $Magnitude = ($dataGempa->magnitude - 2.9)/0.56; //nilai magnitude

                            $alfa = (1080 * EXP(0.5 * $Magnitude)) / pow($r1r2+25,1.32);    //formula donovan  
                            //karena nilai alfa pada observasi memiliki satuan g(m/s2), maka nilai alfa yang dihasilkan
                            //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980
                            //dikarenakan besaran umum gravitasi adalah 9.8 m/s2.
                            $z = round($alfa,2)/980;
                            $hasil_pga = round($z,5);
                            $cek_alfa = round($z,2);

                                if($cek_alfa < 0.05){
                                    $nilai_kemampuan_pga = 1;
                                    $ket_pga = '3a';
                                }elseif($cek_alfa >= 0.05 && $cek_alfa<0.15)
                                {
                                     $nilai_kemampuan_pga = 2;
                                     $ket_pga = '3b';
                                }elseif($cek_alfa >= 0.15 && $cek_alfa<=0.30)
                                {
                                    $nilai_kemampuan_pga = 3;
                                    $ket_pga = '3c';
                                }elseif($cek_alfa > 0.30)
                                {
                                    $nilai_kemampuan_pga = 4;
                                    $ket_pga = '3d';
                                }
                            //akhir donovan




                
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
                                            $calculasi_tipologi = calculasi_tipologi::with(['data_gempa', 'data_titik' , 'tipologi_kawasan' , 'tipologi_kawasan.informasi_tipologi' ])->where('id_gempa', $request->option_gempa)->get();                                       
                                            return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi'));                                                                                                           
                                    } else 
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
                                                    $hasil_kali_pga = $nilai_kemampuan_pga* 5;
                                                    $hasil_kali_bobot_struktur_geologi = $a * 4;
                                                    
                                                    $skor_akhir = $hasil_kali_bobot_geologi_fisik + $hasil_kali_bobot_lereng + $hasil_kali_pga + $hasil_kali_bobot_struktur_geologi ;
                                                    
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
                                                        'id_geologi_fisik' =>  $dataTitik[$i]->id_geologi_fisik,
                                                        'hasil_kali_bobot_geologi_fisik' => $hasil_kali_bobot_geologi_fisik,                                                        
                                                        'ket_geologi_fisik' => $ket_geologi_fisik,
                                                        'id_lereng' =>  $dataTitik[$i]->id_kemiringan_lereng,
                                                        'hasil_kali_bobot_lereng' => $hasil_kali_bobot_lereng,
                                                        'ket_lereng' => $ket_lereng,
                                                        'hasil_pga' => $hasil_pga,
                                                        'nilai_kemampuan_pga' => $nilai_kemampuan_pga,
                                                        'ket_pga' => $ket_pga,
                                                        'hasil_kali_bobot_pga' => $nilai_kemampuan_pga * 5 ,
                                                        'hasil_jarak_struktur_geologi' =>$hasil,
                                                        'nilai_kemampuan_struktur_geologi' => $a ,
                                                        'ket_struktur_geologi' => $ket_struktur_geologi,
                                                        'hasil_kali_bobot_struktur_geologi'  => $hasil_kali_bobot_struktur_geologi,   
                                                        'skor_akhir' => $skor_akhir,
                                                        'kategori' => $kategori
                                                    ]); 
                                                   
                                    }                                       
                              
                    }

                    $cek_calculasi_tipologi = calculasi_tipologi::where('id_gempa', $request->option_gempa)->get();
                    for($m =0; $m<count($cek_calculasi_tipologi); $m++)
                        {      
                            
                            $tipologiKawasan = tipologi_kawasan::all();
                        
                            foreach ($tipologiKawasan as $value) 
                            {
                                if(($value->geologi_batuan == $cek_calculasi_tipologi[$m]->ket_geologi_fisik) && 
                                    ($value->lereng == $cek_calculasi_tipologi[$m]->ket_lereng) &&
                                    ($value->kegempaan == $cek_calculasi_tipologi[$m]->ket_pga) && 
                                    ($value->struktur_geologi == $cek_calculasi_tipologi[$m]->ket_struktur_geologi))
                                {
                                    calculasi_tipologi::where('id', $cek_calculasi_tipologi[$m]->id)->update([
                                        'id_tipologi' => $value->id
                                    ]);   
                                }                        
                            } 
                        }
               
                    
                    $calculasi_tipologi = calculasi_tipologi::with(['data_gempa', 'data_titik'])->where('id_gempa', $request->option_gempa)->get();
                    return view('User.main.proses-datauji-lama', compact('dataTitik', 'dataGempa' , 'dataGempa_option' , 'calculasi_tipologi'));
               
        
    }

}
