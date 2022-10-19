<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestDonovanController extends Controller
{
    public function index()
    {

      // $R = 6371;
      // //titik tujuan
      // $mlat = -3.783957;
      // $mlng = 102.260669;  

      // //titik awal
      // $lat_gempa =   -3.807432;
      // $lng_gempa =   102.262881;  

      

      // $dLat  = deg2rad($mlat - $lat_gempa);  //Rdaerah asal dikurang tujuan
      // $dLong = deg2rad($mlng - $lng_gempa); 
  
      // $a = sin($dLat/2) * sin($dLat/2) +
      //         cos(deg2rad($lat_gempa)) * cos(deg2rad($mlat)) * sin($dLong/2) * sin($dLong/2);
      // $c = 2 * atan2(sqrt($a), sqrt(1-$a));
      // $d = $R * $c;
      // $hasil = $d = round($d, 2);
      // $konversi_meter = $hasil * 1000; 

      // $hasilll_a = (12/$konversi_meter) * 100;

      // if($hasilll_a > 0 && $hasilll_a < 0.07)
      // {
      //    return "datar dan landai";
      // }else if($hasilll_a >= 0.07 && $hasilll_a < 0.3)
      // {
      //    return "miring dan agak curam";
      // }else if($hasilll_a >= 0.3 && $hasilll_a < 1.4)
      // {
      //    return "curam  dan sangat curam";
      // }else if($hasilll_a >= 1.4) 
      // {
      //    return "terjal";
      // }

    


        //jarak episenter
        // $x = pow((119.860-121.649),2) * 111;
        // $y = pow((-0.220)-(-0.911),2) *111;
        // $episenter = sqrt($x + $y);
        // $episenter_round = round($episenter,3);
        
        // //jarak hiposenter
        // $hiposenter = sqrt(pow(213.834,2) + pow(10,2));
        // $hiposenter_round = round($hiposenter,3);
        // return $hiposenter_round;
        //rumus donovan


    //     $d = pow(33,2);
    //     $e = pow(231,2);
    //     $h = $d + $e ;
    //     $hasil = sqrt($h);
    //     $R =  round($hasil,2);
       
    //    $x = pow(3.75+5.22, 2) * 111;
    //    $y = pow(102.27-102.95,2) * 111;

    //    $r1 = round($x,2);
    //    $r2 = round($y,2);

    //    $r1r2 = round(sqrt($r1+$r2),3);


      //  $Magnitude = (8 - 2.9)/0.56;

      //  $alfa = (1080 * EXP(0.5 * 8)) / pow($R+25,1.32);

      //   $Ms = 0.5 * 8;
      //   $alfa = (1080 * pow(2.718,$Ms)) / pow(233+25,1.32); //test punya bapakk lindung

      //  return round($alfa,2);

       //karena nilai alfa pada observasi memiliki satuan g(m/s2), maka nilai alfa yang dihasilkan
       //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980
       //dikarenakan besaran umum gravitasi adalah 9.8 m/s2.
   //     $z = round($alfa,2)/980;
   //  //    /980; mengubah dalam bentuk detik ke G

   //     return round($z,2);

    //    return round($Magnitude,3);

                                
                                // $z = round($donovan,2) * 0.0010197162;
                                // $hasil_pga = round($z,2);

                                  $hiposenter =   pow(33,2) + pow(231.00,2) ;
                                  $a = sqrt($hiposenter);
                            
                                  $Ms = 0.5 * 8;

                                  $alfa = 1080 * EXP($Ms) / pow($a+25,1.32);

                                   return round($alfa,2);

    

    }
}
